document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll('input[type="button"]');
  const contentDiv = document.getElementById("content");

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      const category = this.value.toLowerCase();
      loadContent(category);
    });
  });

  function loadContent(category) {
    fetch(`${category}.html`)
      .then((response) => response.text())
      .then((data) => {
        contentDiv.innerHTML = data;
      })
      .catch((error) => {
        contentDiv.innerHTML = `<p>Error loading content: ${error}</p>`;
      });
  }
});
