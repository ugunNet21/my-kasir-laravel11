<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check Repair Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Check Repair Status</h1>

        <form id="statusForm">
            @csrf
            <div class="form-group">
                <label for="invoiceId">Invoice ID:</label>
                <input type="text" class="form-control" id="invoiceId" name="invoiceId" required>
            </div>
            <button type="submit" class="btn btn-primary">Check Status</button>
        </form>

        <div id="statusResult" class="mt-4"></div>

        <!-- Modal -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Repair Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Invoice ID:</strong> <span id="modalInvoiceId"></span></p>
                        <p><strong>Customer:</strong> <span id="modalCustomer"></span></p>
                        <p><strong>Date:</strong> <span id="modalDate"></span></p>
                        <p><strong>Total:</strong> <span id="modalTotal"></span></p>
                        <p><strong>Grand Total:</strong> <span id="modalGrandTotal"></span></p>
                        <p><strong>Repair Status:</strong> <span id="modalRepairStatus"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('statusForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const invoiceId = document.getElementById('invoiceId').value;
            const token = document.querySelector('input[name="_token"]').value;

            fetch(`/invoices/${invoiceId}/status`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                }
            })
            .then(response => response.json())
            .then(data => {
                let resultDiv = document.getElementById('statusResult');
                if (data.error) {
                    resultDiv.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                } else {
                    document.getElementById('modalInvoiceId').innerText = data.invoice_id;
                    document.getElementById('modalCustomer').innerText = data.customer;
                    document.getElementById('modalDate').innerText = data.date;
                    document.getElementById('modalTotal').innerText = data.total;
                    document.getElementById('modalGrandTotal').innerText = data.grand_total;
                    document.getElementById('modalRepairStatus').innerText = data.status;
                    var statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
                    statusModal.show();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                resultDiv.innerHTML = `<div class="alert alert-danger">An error occurred while fetching the status.</div>`;
            });
        });
    </script>
</body>
</html>
