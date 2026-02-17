<form id="leadForm">
  <input type="text" name="name" placeholder="Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <input type="text" name="phone" placeholder="Phone" required>
  <input type="hidden" name="source" value="website_1">
  <button type="submit">Submit</button>
</form>
<script>
document.getElementById('leadForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('http://localhost/leadsApi/public/api/lead-store', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => alert(data.message));
});
</script>
