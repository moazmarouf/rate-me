
$(window).on('load', function () {
    $("#preloader").fadeOut(100, function () {
        $("body").fadeIn(100)
    })
    //dorpdown-aside
    $('.dropdown-aside').fadeOut();
    $('.dorpdown-list').click(function () {
        $(this).siblings(".dropdown-aside").fadeToggle();
    });

    //aside open - close
    $('header .side .aside').click(function () {
        $('aside').toggleClass('width-9');
        $('.home-page .content').toggleClass('content-width');
        $('aside ul li span').fadeToggle();
        $('aside ul li').toggleClass('text-center');
        $('.home-page aside .user-side').toggleClass('p-0');
        $('.home-page aside .user-side a:first-of-type').toggleClass('translate-first');
        $('.home-page aside .user-side a:last-of-type').toggleClass('translate-last');
        $('.home-page>aside>ul').toggleClass('aside-padding');
        // $(this).parents().toggleClass('justify-content-center');
        $('.home-page aside ul li i, .home-page aside ul li a svg').toggleClass('icon-svg');
    });
    //aside mobile
    $('header .side .mobile-aside').click(function () {
        $('aside').toggleClass('left-130');
        $(this).toggleClass('rot');
    });
    // Start Loader
    // Convert Password Field To Text Field

    $('.eye').click(function () {
        $(this).toggleClass('active');
        $(this).toggleClass('fa-eye-slash');
        if ($(this).hasClass('active')) {
            $(this).parent().find('input').attr('type', 'text');
        } else {
            $(this).parent().find('input').attr('type', 'password');
        }
    });
    // $('#example').DataTable({
    //     "language": {
    //         "sProcessing": "جارٍ التحميل...",
    //         "sLengthMenu": "أظهر _MENU_ مدخلات",
    //         "sZeroRecords": "لم يعثر على أية سجلات",
    //         "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    //         "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
    //         "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    //         "sInfoPostFix": "",
    //         "sSearch": " ",
    //         "sUrl": "",
    //         "oPaginate": {
    //             "sFirst": "الأول",
    //             "sPrevious": "السابق",
    //             "sNext": "التالي",
    //             "sLast": "الأخير"
    //         }
    //     }
    // });
    // $(document).on('click', 'button.delete', function(e) {
    //     $(this).parents("tr").remove();
    // });
    // $('button.delete').click(function () {
    //     $(this).parents("tr").remove();
    // });
    $('#example_filter input').attr("placeholder", "كلمة البحث");
    $(".add-row").click(function () {
        var name = $("#name").val();
        var markup = '<tr><td><input class="rocord-check" type="checkbox" name="record"></td><td>1</td><td>' + name + '</td><td><button type="button" class="edit">تعديل</button></td><td><button type="button" class="delete">حذف</button></td><td><i class="fas fa-ellipsis-h"></i></td></tr>';
        $("table tbody").append(markup);
    });


    // $('.delete-all').on('click',function(){
    //     if(this.checked){
    //         $('.rocord-check').each(function(){
    //             this.checked = true;
    //         });
    //     }else{
    //          $('.rocord-check').each(function(){
    //             this.checked = false;
    //         });
    //     }
    // });
    // $('.btn-all').click(function(){
    //     $('input.rocord-check:checked').parents("tr").remove();
    // });
    //upload images
    $(function () {
        // var imagesPreview = function (input, placeToInsertImagePreview) {
        //     $('.gallery').empty();
        //     if (input.files) {
        //         var filesAmount = input.files.length;
        //         for (i = 0; i < filesAmount; i++) {
        //             var reader = new FileReader();
        //             reader.onload = function (event) {
        //                 var image = document.createElement('img');
        //                 image.setAttribute('src', event.target.result);
        //                 var body = document.createElement('div');
        //                 var button = document.createElement('button');
        //                 var input = document.createElement('input');
        //                 input.setAttribute('name', 'images[]');
        //                 input.setAttribute('type', 'hidden');
        //                 button.setAttribute('class', 'close');
        //                 button.innerHTML = '<i class="fa fa-times-circle"></i>';
        //                 body.appendChild(image);
        //                 body.appendChild(input);
        //                 body.appendChild(button);
        //                 body.setAttribute('class', 'images');
        //                 console.log(body);
        //                 $('.gallery').append(body);
        //                 ($($.parseHTML(body)).appendTo(placeToInsertImagePreview));
        //             }
        //             reader.readAsDataURL(input.files[i]);
        //         }
        //     }
        // };
        $(document).on('click', '.close', function (event) {
            event.preventDefault();
            $(this).parent().remove();
        });
        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
        $('.add-account i').click(function () {
            $('.apend-accounts').append($('.accounts').html());
        });
        $(document).on('click', '.add-branch i', function () {
            $('.apend-parts').append($('.branchs').html());
        });
        $('.another-part').fadeOut();
        $('.yes').click(function () {
            $('.another-part').fadeIn();
        });
        $('.no').click(function () {
            $('.another-part').fadeOut();
        });
        $(document).on('click', '.another-part .delete', function () {
            $(this).parents(".another-part").remove();
        });
        $('.notification-list').fadeOut();
        $('.notification').click(function () {
            $('.notification-list').fadeToggle();
        });
    });
});


