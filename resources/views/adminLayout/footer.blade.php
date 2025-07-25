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

    // Uncheck all checkboxes in the group
    container.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    checkbox.checked = true;

    // Clear previous label colors
    ['pending', 'approved', 'suspended'].forEach(status => {
      const label = document.getElementById(`${status}-label-${businessId}`);
      label.classList.remove('bg-yellow-200', 'bg-green-200', 'bg-red-200');
    });

    // Set selected label background color
    const activeLabel = document.getElementById(`${selectedStatus}-label-${businessId}`);
    if (selectedStatus === 'approved') {
      activeLabel.classList.add('bg-green-200');
    } else if (selectedStatus === 'suspended') {
      activeLabel.classList.add('bg-red-200');
    } else if (selectedStatus === 'pending') {
      activeLabel.classList.add('bg-yellow-200');
    }

    // Show spinner
    const spinner = document.getElementById(`spinner-${businessId}`);
    spinner.classList.remove('hidden');

    // Send status update to backend
    fetch(`/admin/businesses/${businessId}/status`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
      },
      body: JSON.stringify({ status: selectedStatus }),
    })
      .then(res => res.json())
      .then(data => {
        if (!data.success) {
          alert('Error updating status: ' + (data.message || 'Failed to update status'));
        }
      })
      .catch(error => {
        console.error(error);
        alert('Error updating status: ' + error.message);
      })
      .finally(() => {
        spinner.classList.add('hidden');
      });
  }

  // Initialize correct label color on page load
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.checkbox-status').forEach(container => {
      const status = container.dataset.currentStatus;
      const businessId = container.dataset.businessId;

      const label = document.getElementById(`${status}-label-${businessId}`);
      if (status === 'approved') label.classList.add('bg-green-200');
      else if (status === 'suspended') label.classList.add('bg-red-200');
      else if (status === 'pending') label.classList.add('bg-yellow-200');
    });
  });
</script>