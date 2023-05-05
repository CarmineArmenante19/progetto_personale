let toggleMenu=document.querySelector('.toggleMenu');
let navigation=document.querySelector('.navigation');
let dropdown_navbar=document.querySelectorAll('#dropdown-navbar');
let span_navbar=document.querySelector('#span-navbar');
let logout_button=document.querySelector('#logout-button');
let logout_form=document.querySelector('#logout-form');


toggleMenu.addEventListener('click',()=>{
    navigation.classList.toggle('active');
})

if (dropdown_navbar)
{
    dropdown_navbar.forEach((drop) =>
    {
    let menu = drop.querySelector('.dropdown-menu');

    drop.addEventListener('mouseenter', () =>
    {
    menu.classList.add('hover');
    span_navbar.style.display = 'none';
    });

    drop.addEventListener('mouseleave', () =>
    {
        menu.classList.remove('hover');
        span_navbar.style.display = 'flex';
    });
});
}
  





if (logout_button) {
    logout_button.addEventListener('click',(event)=>{
        event.preventDefault();
        logout_form.submit();
    })
}