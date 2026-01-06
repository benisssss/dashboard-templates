<!-- Bootstrap modal -->
<div class="modal fade gsap_animate" id="expandModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xxl modal-dialog-centered">
        <div class="modal-content d-flex flex-column" style="overflow: hidden;">
            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">Modal Header</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body (collapsed initially) -->
            <div class="modal-body overflow-auto">
                <div class="p-1" style="height:75vh;">
                    <p>This is the modal body content. It expands when the modal opens.</p>
                    <p>Add more content here...</p>
                </div>
            </div>
            <!-- Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-sm btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> 
 
<!-- Trigger -->
<!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#expandModal">
    Open Modal
</button> -->
