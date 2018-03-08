var postId = 0;
$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $.ajax({
        method: 'GET',
        url: urlLike,
        data: { postId: postId}
    })
        .done(function() {

        });
});
