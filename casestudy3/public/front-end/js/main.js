$(document).ready(function (){
    $('body').on('click','.change-img',function (){
        let link = $(this).attr('src');
        $('#page-img').attr('src',link);
    })

//    Change Value Quantity
    $('#up').click(function (){
       let value = $("#quantityBtn").val()
       value++;
       $("#quantityBtn").val(value);
    })
    $('#down').click(function (){
        let value = $("#quantityBtn").val()
        if(value > 1){
            value--;
        }
        $("#quantityBtn").val(value);
    })

    $('.search-icon').click(function (){
       $('.form-search').toggle()
    });
})
const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.sub');

    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');
    })
}
navSlide();

//Owl-carousel
