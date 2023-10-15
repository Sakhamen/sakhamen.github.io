$(document).ready(function () {
  // Set Year
  const d = new Date();
  $("#year").text(d.getFullYear());

  // Email Form
  if ($("#contact-form").length) {
    $("#contact-form").validate({
      // Specify validation rules
      rules: {
        fullname: "required",
        subject: "required",
        message: "required",
        landType: "required",
        email: {
          required: true,
          email: true,
        },
        phone: {
          required: true,
          digits: true,
          rangelength: [10, 12],
        },
      },

      // Error messages
      messages: {
        fullname: "Please enter your full name",
        subject: "Please select an option",
        landType: "Please select type of land ",
        message: "Please enter your enquiry",
        email: "Please enter a valid email address",
        phone: {
          required: "Please enter your cellphone number",
          digits: "Please enter a valid cellphone number",
          rangelength: "Your cellphone number should be 10 digit number",
        },
      },

      submitHandler: function (form, event) {
        // stop refreshing the page
        event.preventDefault();
        form.submit();
        return false;
      },
    });
  }

  //  Add sticky nav when you scroll pass certain element or call.
  if ($(".section-services").length) {
    $(".section-services").waypoint(
      function (direction) {
        if (direction === "down") {
          $("nav").addClass("sticky");
        } else {
          $("nav").removeClass("sticky");
        }
      },
      {
        offset: "60px",
      }
    );
  }

  /* load youtube js overlay */
  loadYTVideoPlayer();
});

function loadYTVideoPlayer() {
  const videoItems = $(".video");

  videoItems.each(function (_index, video) {
    const item = $(video);
    new YoutubeOverlayModule({
      sourceUrl: item.attr("data-video"),
      triggerElement: "#" + item.attr("id"),
      progressCallback: () => {
        // console.log("Popup Closed.");
      },
    }).activateDeployment();
  });
}
