$('.like').click(function(e) {
    e.preventDefault();
    var like = e.target.previousElementSibling == null;
    var postid = e.target.parentNode.dataset['postid'];
    var data = {
        isLike: like,
        post_id: postid
    }
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

$('.request').click(function(e) {
    e.preventDefault();
    var request = e.target.previousElementSibling == null;
    var userid = e.target.parentNode.dataset['userid'];
    var data = {
        isRequest: request,
        user_id: userid
    }
    axios.post('/request', data).then(response => {
        console.log(e);
        if (response.data['true']) {
            e.currentTarget.parentElement.innerHTML = "<span class='success'>You are now Friends</span>";
        }
        else {
            e.currentTarget.parentElement.innerHTML = "<span class='danger'>You canceled the friend request</span>";
        }
    })
});
