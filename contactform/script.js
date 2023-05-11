const form = document.getElementById('contact-form');

form.addEventListener('submit', async (e) => {
  e.preventDefault();

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  const response = await fetch('/submit-form.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      name,
      email,
      message
    })
  });

  if (response.ok) {
    alert('Message sent!');
    form.reset();
  } else {
    alert('An error occurred. Please try again later.');
  }
});
