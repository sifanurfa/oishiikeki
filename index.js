// menu
function showContent(contentId) {
  var contents = document.querySelectorAll(".content");
  contents.forEach(function (content) {
    content.classList.remove("active");
    content.style.display = "none";
  });

  var contentToShow = document.getElementById(contentId);
  contentToShow.classList.add("active");
  contentToShow.style.display = "block";

  var buttons = document.querySelectorAll(".kategori button");
  buttons.forEach(function (button) {
    button.classList.remove("active-button");
  });

  var activeButton = document.querySelector(
    `button[onclick="showContent('${contentId}')"]`
  );
  activeButton.classList.add("active-button");
}

// Menampilkan konten default
document.addEventListener("DOMContentLoaded", function () {
  var defaultContent = document.querySelector(".content.active");
  if (defaultContent) {
    defaultContent.style.display = "block";
  }

  var defaultButton = document.querySelector(".kategori button");
  if (defaultButton) {
    defaultButton.classList.add("active-button");
  }
});

// message
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("submit-message");
  form.addEventListener("submit", function (event) {
    alert("Pesan telah terkirim!");
  });
});
