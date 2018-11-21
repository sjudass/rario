/**
 * Created by antoh on 28.10.2018.
 */
$(.'carousel').carousel({
    interval: 300;
});

$("#contactForm").submit(function(event){
    // отменяет подачу формы
    event.preventDefault();
    submitForm();
});

