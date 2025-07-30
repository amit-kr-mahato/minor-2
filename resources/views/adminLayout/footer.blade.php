<script>
  document.getElementById('fileInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
      document.getElementById('preview').src = URL.createObjectURL(file);
    }
  });
</script>

@if (session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: "{{ session('success') }}",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });
    });
  </script>
@endif

<script>
  function submitCheckboxStatus(checkbox) {
    const container = checkbox.closest('.checkbox-status');
    const businessId = container.dataset.businessId;
    const selectedStatus = checkbox.value;

    // Uncheck all checkboxes in this group
    container.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    checkbox.checked = true;

    // Remove old background colors from all labels
    ['pending', 'approved', 'suspended'].forEach(status => {
      const label = document.getElementById(`${status}-label-${businessId}`);
      if (label) {
        label.classList.remove('bg-yellow-200', 'bg-green-200', 'bg-red-200');
      }
    });

    // Apply the selected label color
    const activeLabel = document.getElementById(`${selectedStatus}-label-${businessId}`);
    if (activeLabel) {
      if (selectedStatus === 'approved') activeLabel.classList.add('bg-green-200');
      else if (selectedStatus === 'suspended') activeLabel.classList.add('bg-red-200');
      else if (selectedStatus === 'pending') activeLabel.classList.add('bg-yellow-200');
    }

    // Show the spinner
    const spinner = document.getElementById(`spinner-${businessId}`);
    spinner?.classList.remove('hidden');

    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Send the status update request
    fetch(`/admin/businesses/${businessId}/status`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({ status: selectedStatus })
    })
    .then(async res => {
      const contentType = res.headers.get('content-type');
      if (contentType && contentType.includes('application/json')) {
        const data = await res.json();
        if (!data.success) {
          alert('Error updating status: ' + (data.message || 'Unknown error'));
        }
      } else {
        const html = await res.text();
        console.error('Server returned non-JSON response:', html);
        alert('Unexpected server error. Check console.');
      }
    })
    .catch(error => {
      console.error('Fetch failed:', error);
      alert('Error updating status: ' + error.message);
    })
    .finally(() => {
      spinner?.classList.add('hidden');
    });
  }

  // Highlight the current status on page load
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.checkbox-status').forEach(container => {
      const status = container.dataset.currentStatus;
      const businessId = container.dataset.businessId;
      const label = document.getElementById(`${status}-label-${businessId}`);
      if (label) {
        if (status === 'approved') label.classList.add('bg-green-200');
        else if (status === 'suspended') label.classList.add('bg-red-200');
        else if (status === 'pending') label.classList.add('bg-yellow-200');
      }
    });
  });
</script>

