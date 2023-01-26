window.onscroll = function triggerEventOnScroll() {
  const scrollPosition = window.scrollY;
  const targetPosition = 100; // adjust this value to your desired position
  if (scrollPosition > targetPosition) {
    // document.getElementById("item-header-avatar").style.position = "fixed";
    // document.getElementById('item-header-avatar').style.top = '300px';

    document.querySelector("#item-header-avatar img").style.visibility =
      "hidden";
    // setTimeout(()=>{document.querySelector("#item-header-content").style.marginTop  = "-200px"; },100)
    document.querySelector("#item-header-content").style.marginTop = "-200px";
    jQuery("#item-header-avatar").removeClass("imgSlick");
  }
  if (scrollPosition < targetPosition) {
    document.querySelector("#item-header-content").style.marginTop = "0px";
    setTimeout(() => {
      document.querySelector("#item-header-avatar img").style.visibility =
        "visible";
    }, 100);
    jQuery("#item-header-avatar").addClass("imgSlick");
  }
};

// For start btns of course curriculumn

jQuery(document).ready(function () {
  jQuery("tr.course_lesson").hover(function () {
    jQuery(this).find(".course_button").fadeToggle("500");
  });
});

/* script for handling the like button click
jQuery(document).on("click", ".like-button", function (e) {
  e.preventDefault();
  // gets the post id from the data attribute
  var postId = jQuery(this).data("post-id");
  // make an ajax request to the server
  jQuery.ajax({
    type: "POST",
    url: ajaxurl,
    data: {
      action: "like_post",
      post_id: postId,
    },
    success: function (response) {
      // handle the response and update the button
      console.log(response);
    },
  });
}); */

/* jQuery(document).on("click", ".like-button", function (event) {
  event.preventDefault(); //prevent default action
  var postId = jQuery(this).attr("postId"); //get form action url
  console.log('postID :'+postId);
  console.log("hello world");
  jQuery.ajax({
    url: "/AnotherProject/wp-admin/admin-ajax.php?action=custom_post_like",

    type: "POST",
    data: {
      'post_id': postId,
      'your_data': postId
  },
    
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      alert(data);
      //location.reload();
      //top.location.href="admin.php?page=hotel_info_data_list";
    },
  });
});
 */
