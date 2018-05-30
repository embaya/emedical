/* helper functions */
function validateEmail(email) {
    var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return emailReg.test(email);
}

function validateCin(cin) {
    var cinReg = new RegExp(/^[a-zA-Z]{1,2}[0-9]{1,7}$/);
    return cinReg.test(cin);
}

function validateNss(nss) {
    var nssReg = new RegExp(/^[0-9]{10}$/);
    return nssReg.test(nss);
}

function scrollTo(cible) {
    if ($(cible).length >= 1) {
        hauteur = $(cible).offset().top - ($(window).height() - $(cible).height()) / 2;
    } else {
        return false;
    }
    $('html,body').animate({
        scrollTop: hauteur
    }, 1000);
    return false;
}

function validateFloat(number) {
    var numberReg = new RegExp(/^[0-9]{1,10}\.?[0-9]{0,2}$/);
    return numberReg.test(number);
}

function confirmation() {
    var msg = 'voullez-vous vraiment effectué cette action';
    return window.confirm(msg, 'Alert');
}

(function ($) {
    /* menu config */
    var li = $('.menu li span:last-child'),
        shelfBtn = $('#trigger-shelf');
    shelfBtn.on('click', function () {
        $(document.body).toggleClass('shelf');
        if ($(document.body).hasClass('shelf'))
            $.cookie('shelf_class', 'shelf', {expires: 7, path: '/'});
        else $.cookie('shelf_class', '', {expires: 7, path: '/'});

        shelfBtn.find('.glyphicon').toggleClass('glyphicon-chevron-right');
    });
    if ($.cookie('shelf_class') === 'shelf') {
        shelfBtn.find('.glyphicon').toggleClass('glyphicon-chevron-right');
        $(document.body).addClass($.cookie('shelf_class'));
    }

    /* print button */
    $('#btnPrint').on('click', function () {
        $('#mycontainer').removeClass('hidden-print');

        window.print();
    });

    /* check all check buttons*/
    $("#checkall").click(function () {
        if ($("#checkall").prop("checked")) $("input:checkbox").prop("checked", true);
        else $("input:checkbox").prop("checked", false);
    });

    /* tooltip */
    $('a[data-toggle="tooltip"]').tooltip();

    /* select 2 */
    $('.select2.search').select2();
    $('.select2.no-search').select2({minimumResultsForSearch: -1});

    var $collectionHolder;

    // setup an "add a tag" link
    var $addTagLink = $('<a href="#" class="add_tag_link">Ajouter un acte</a>');
    var $newLinkLi = $('<li></li>').append($addTagLink);

    jQuery(document).ready(function () {
        // Get the ul that holds the collection of tags
        $collectionHolder = $('ul.actes');

        $collectionHolder.find('li').each(function() {
            addTagFormDeleteLink($(this));
        });
        // add the "add a tag" anchor and li to the tags ul
        $collectionHolder.append($newLinkLi);

        // count the current form inputs we have (e.g. 2), use that as the new
        // index when inserting a new item (e.g. 2)
        $collectionHolder.data('index', $collectionHolder.find(':input').length);

        $addTagLink.on('click', function (e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // add a new tag form (see next code block)
            addTagForm($collectionHolder, $newLinkLi);
        });
        $('#ben_doctorsbundle_fse_acte_conditionne').on('change', function () {
            if ($(this).prop("checked") == true) {
                $('#ben_doctorsbundle_fse_beneficiaire').parent().parent().hide();
                $('#ben_doctorsbundle_fse_patient').parent().parent().show();
                $('#ben_doctorsbundle_fse_consultation').parent().parent().show();
            } else {
                $('#ben_doctorsbundle_fse_beneficiaire').parent().parent().show();
                $('#ben_doctorsbundle_fse_patient').parent().parent().hide();
                $('#ben_doctorsbundle_fse_consultation').parent().parent().hide();
            }
        });

    });

    function addTagForm($collectionHolder, $newLinkLi) {
        // Get the data-prototype explained earlier
        var prototype = $collectionHolder.data('prototype');

        // get the new index
        var index = $collectionHolder.data('index');

        var newForm = prototype;
        // You need this only if you didn't set 'label' => false in your tags field in TaskType
        // Replace '__name__label__' in the prototype's HTML to
        // instead be a number based on how many items we have
        // newForm = newForm.replace(/__name__label__/g, index);

        // Replace '__name__' in the prototype's HTML to
        // instead be a number based on how many items we have
        newForm = newForm.replace(/__name__/g, index);

        // increase the index with one for the next item
        $collectionHolder.data('index', index + 1);

        // Display the form in the page in an li, before the "Add a tag" link li
        var $newFormLi = $('<li></li>').append(newForm);
        //update_form_inputs();
        console.log($newFormLi);
        $newLinkLi.before($newFormLi);
        addTagFormDeleteLink($newFormLi);
    }

    function update_form_inputs(el){
        var form_name = el.value;
        var $this = $(el);
        var parts = $this.attr('name').split(/[[\]]{1,2}/);
        var select_name = jQuery.grep(parts, function(n){ return (n); });
        var el_name = select_name.pop();
        var $this_id = $this.attr('id') + '_dynamic_' + el_name;
        console.log(); // ["recipe","0","recipe_photo",""]
        // console.log($this_id);
        var data = {};
        var action = Routing.generate('ben_fse_get_from');
        data['form_get_type'] = form_name;
        $.ajax({
            url: action,
            type: 'POST',
            data: data,
            success: function (html) {
                if ($('#' + $this_id).length == 0) {
                    $('<div style="margin-top:10px" id ="'+$this_id+'"></div>').insertAfter($this);
                }
                $('#' + $this_id).empty().html(html);
            }
        });
    }

    function addTagFormDeleteLink($tagFormLi) {
        var $removeFormA = $('<a href="#">Supprimer acte</a>');
        $tagFormLi.append($removeFormA);

        $removeFormA.on('click', function(e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            // remove the li for the tag form
            $tagFormLi.remove();
        });
    }

    (function ($) {
        $(document).on("change", 'select[id^="ben_doctorsbundle_fse_actes"]', function () {
            update_form_inputs(this);
        });
    })(jQuery);

})(jQuery);