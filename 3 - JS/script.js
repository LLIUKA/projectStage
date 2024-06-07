document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll("form");
  forms.forEach((form) => {
    form.addEventListener("submit", function (event) {
      event.preventDefault(); // Empêche le formulaire de se soumettre de manière normale
      const button = form.querySelector('button[type="submit"]');
      const url = button.getAttribute("data-url");
      console.log("Redirection vers : ", url);
      window.location.href = url; // Redirige vers la nouvelle URL
    });
  });
});
