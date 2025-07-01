
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
    const businessId = container.getAttribute('data-business-id');
    const status = checkbox.value;
    const spinner = container.querySelector('.spinner');

    // Uncheck other checkboxes and remove color class from their labels
    container.querySelectorAll('input[type="checkbox"]').forEach(cb => {
      if (cb !== checkbox) {
        cb.checked = false;
        cb.parentElement.querySelector('.status-label').classList.remove(
          'text-green-800', 'bg-green-100',
          'text-yellow-800', 'bg-yellow-100',
          'text-red-800', 'bg-red-100'
        );
      }
    });

    // Show spinner
    spinner.classList.remove('hidden');

    fetch(`/admin/businesses/${businessId}/status`, {
      method: 'PATCH',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify({ status: status }),
    })
    .then(res => {
      if (!res.ok) throw new Error('Failed to update status');
      return res.json();
    })
    .then(data => {
      spinner.classList.add('hidden');

      // Remove colors from all labels first
      container.querySelectorAll('.status-label').forEach(label => {
        label.classList.remove(
          'text-green-800', 'bg-green-100',
          'text-yellow-800', 'bg-yellow-100',
          'text-red-800', 'bg-red-100'
        );
      });

      // Add color to selected label
      const selectedLabel = checkbox.parentElement.querySelector('.status-label');
      if (status === 'approved') {
        selectedLabel.classList.add('text-green-800', 'bg-green-100');
      } else if (status === 'pending') {
        selectedLabel.classList.add('text-yellow-800', 'bg-yellow-100');
      } else if (status === 'suspended') {
        selectedLabel.classList.add('text-red-800', 'bg-red-100');
      }
    })
    .catch(error => {
      spinner.classList.add('hidden');
      alert('Error updating status: ' + error.message);
      checkbox.checked = false;  // revert checkbox on error
    });
  }
</script>
