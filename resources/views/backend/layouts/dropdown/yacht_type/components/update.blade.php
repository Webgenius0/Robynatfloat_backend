<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="updateLabel">Add Customer</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.yacht.type.update', $yachtType->slug)}}" method="POST" id="updateYachtType">
                @csrf
                @method('PUT')
                <div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Yacht Type Name</label>
                        <input type="text" value="{{$yachtType->name}}" class="form-control" placeholder="Enter name" id="yacht_type_name">
                        <p class="v-error-message" id="update_name_error"></p>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1" id="updateBtn">Save</button>
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
    // When the Save button is clicked
    $('#updateBtn').click((e) => {
        $('#overlay').show();
        e.preventDefault();

        const yachtTypeName = $('#yacht_type_name').val();  // Get the value from the input field

        // Clear any previous error messages
        $('#update_name_error').text('');

        // Prepare data to send via AJAX
        const formData = {
            name: yachtTypeName,
            _method: 'PUT'
        };

        $.ajax({
            url: '{{ route('admin.yacht.type.update', $yachtType->slug) }}',
            type: 'POST',
            data: formData,
            success: (response) => {
                if (response.success) {
                    alert('Yacht type updated successfully');
                    // Close the modal after success
                    $('#exampleModal').modal('hide'); // Replace '#exampleModal' with your modal's ID
                } else {
                    // Handle validation errors if there are any
                    if (response.errors && response.errors.name) {
                        $('#update_name_error').text(response.errors.name[0]);
                    }
                }
            },
            error: (xhr, status, error) => {
                // Handle AJAX errors (e.g. network issues, server errors)
                alert('An error occurred while saving the data. Please try again.');
            }
        });
    });
});

</script>
