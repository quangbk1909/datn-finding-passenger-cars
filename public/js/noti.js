var getNewNotifications = function () {
    $.getJSON('/notifications', function (data) {
    	let newNoti = false;
    	let numberNotiUnread = 0;
    	let notifications;
    	let notiContent = `<div id="noti-list" class="notification-details">`;
        if (data.unauthenticated == true) {
        	return ;
        } else {
        	notifications = data.notifications
        	if(data.notifications.length > 0) {
        		notifications.forEach (function(currentValue) {
        			if (currentValue.readed == 0) {
        				newNoti = true;	
        				numberNotiUnread += 1;
        			}
        			notiContent += `<a href="user/dashboard">
										<div class="media">
											<div class="media-body">
												<p>`+ currentValue.content +`</p>	
												<div class="comment-date">`+currentValue.created_at+`</div>
											</div>
										</div>
									</a>`
        		});
        		notiContent += "</div>"
        	}
        	if (newNoti) {
        		let bellWithNumberNoti = `<span id="noti-bell" class="fa-stack fa-1x has-badge" data-count="`+numberNotiUnread +`">
										  <i class="fa fa-bell fa-stack-1x "></i>
										</span>`
        		$("#noti-bell").replaceWith(bellWithNumberNoti);
				$("#noti-list").replaceWith(notiContent);

        	}
        }
    });
};

setInterval(getNewNotifications, 3000);


function markNotiAsRead() {
	 $.getJSON('/notifications/markAsRead', function (data) {
		if (data.success) {
			let bell = `<i id="noti-bell" class="fas fa-bell"></i>`;
			$("#noti-bell").replaceWith(bell);
		}
	 });
}