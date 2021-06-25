require('./bootstrap');

//console.log('SCRIPT FOR ADMIN PAGES');


/**
 * DELETE POST CONFIRM
 */
const delForm = document.querySelectorAll('.delete-post-form');
console.log(delForm);


delForm.forEach(form => {
    form.addEventListener('submit', function(e) {
        const resp = confirm('You really want to delele this post?');
        console.log(resp);

        //evitare il submit solo se è false
        if( ! resp) {
            e.preventDefault();
        }
    });
});