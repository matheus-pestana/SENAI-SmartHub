function togglePasswordVisibility() {
  const senhaInput = document.getElementById('senha');
  const eyeIcon = document.querySelector('.eye-icon');
  if (senhaInput.type === 'password') {
      senhaInput.type = 'text';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
  } else {
      senhaInput.type = 'password';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
  }
}