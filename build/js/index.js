const modal = document.querySelector(".modal");
const searchBtn = document.getElementById("searchBtn");
const closeBtn = document.querySelector(".closeBtn");

function showModal() {
  modal.classList.add("active");

  const body = document.body;
  body.style.overflow = "hidden";
}

function closeModal() {
  modal.classList.remove("active");
  document.body.style.overflow = "auto";
}

searchBtn.addEventListener("click", showModal);
closeBtn.addEventListener("click", closeModal);
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    closeModal();
  }
});
