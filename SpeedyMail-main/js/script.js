<!-- Asegúrate de incluir la biblioteca Email.js en tu página -->
<script src="https://cdn.emailjs.com/dist/email.min.js"></script>

<script>
  document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    const btn = document.getElementById('button');
    btn.value = 'Sending...';

    // Configuración de Email.js para 000webhost
    emailjs.init("user_your_emailjs_user_id");

    const templateParams = {
      to_name: document.getElementById('to_name').value,
      email_id: document.getElementById('email_id').value,
      from_name: document.getElementById('from_name').value,
      message: document.getElementById('message').value
    };

    emailjs.send("smtp_server", "template_name", templateParams)
      .then(
        function(response) {
          btn.value = 'Send Email';
          alert('Your email has been sent successfully!');
          // Restablecer los valores de los campos de entrada
          document.getElementById('to_name').value = '';
          document.getElementById('email_id').value = '';
          document.getElementById('from_name').value = '';
          document.getElementById('message').value = '';
        },
        function(error) {
          btn.value = 'Send Email';
          alert('Error: ' + error.text);
        }
      );
  });
</script>
