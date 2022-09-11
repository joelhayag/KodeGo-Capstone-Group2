function rate_update(star, rate){
    let stars = document.querySelectorAll('.rate');
    let rate_value = document.querySelector('.rate_value');
    let rate_value_show = document.querySelector('.rate_value_show');


    for(let i = 0; i < stars.length; i++){
        stars[i].classList.remove('text-warning');
    }
    for(let i = 0; i < rate; i++){
        stars[i].classList.add('text-warning');
    }

    rate_value.value = rate;
    rate_value_show.innerHTML = "( " + rate + " /" + stars.length + " )";
}
