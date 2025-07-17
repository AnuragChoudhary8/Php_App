function validateForm() {
  const name = document.getElementById("full_name").value.trim();
  const email = document.getElementById("email").value.trim();
  const destination = document.getElementById("destination").value.trim();
  const travelDate = document.getElementById("travel_date").value.trim();

  if (!name || !email || !destination || !travelDate) {
    alert("Please fill all required fields.");
    return false;
  }

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailPattern.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  return true;
}
