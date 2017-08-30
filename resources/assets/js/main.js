$('.like').click(function(e) {
    e.preventDefault();
    var like = e.target.previousElementSibling == null;
    var postid = e.target.parentNode.dataset['postid'];
    var data = {
        isLike: like,
        post_id: postid
    }
    console.log(e);
    axios.post('/like', data).then(response => {
        $("[data-postid='" + response['data']['post_id'] + "'] > .active-like").attr('class', 'btn btn-link like');
        e.currentTarget.className = "btn btn-link like active-like";
    })
});

$('.friend').click(function(e) {
    e.preventDefault();
    var friendid = e.target.parentNode.dataset['friendid'];
    var data = {
        friend_id: friendid
    }
    axios.post('/friend', data).then(response => {
        e.target.innerHTML = "Remove Friend";
        e.currentTarget.className = "btn btn-link remove-friend";
    })
})

$('.remove-friend').click(function(e) {
    e.preventDefault();
    var friendid = e.target.parentNode.dataset['friendid'];
    var data = {
        friend_id: friendid
    }
    axios.post('/friend/remove', data).then(response => {
        e.target.innerHTML = "Add Friend";
        e.currentTarget.className = "btn btn-link friend";
    })
})
