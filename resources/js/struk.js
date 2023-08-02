const quantityInputs = document.querySelectorAll('.quantity-input');
const subtotalCells = document.querySelectorAll('.subtotal');

function updateSubtotal() {
    const cartItems = document.querySelectorAll('.cart-items tr');

    cartItems.forEach((item, index) => {
        const input = item.querySelector('.quantity-input');
        const hargaInput = item.querySelector('[data-harga]');

        const quantity = parseFloat(input.value);
        const harga = parseFloat(hargaInput.dataset.harga);

        if (isNaN(quantity)) {
            subtotalCells[index].textContent = 'Invalid Quantity';
        } else {
            const subtotal = quantity * harga;
            subtotalCells[index].textContent = subtotal;
        }
    });
}

// Panggil fungsi updateSubtotal saat input jumlah berubah
quantityInputs.forEach((input) => {
    input.addEventListener('input', updateSubtotal);
});

// Panggil fungsi updateSubtotal saat halaman pertama kali dimuat
updateSubtotal();

function calculateSubtotal() {
    var rows = document.querySelectorAll(".cart-items tr");
    rows.forEach(function(row) {
        var harga = parseFloat(row.querySelector("[data-harga]").getAttribute("data-harga"));
        var jumlah = parseInt(row.querySelector(".quantity-input").value);
        var subtotal = harga * jumlah;
        row.querySelector(".subtotal").textContent = subtotal;
    });
}

// Function to calculate and display total and kembalian
function calculateTotalAndKembalian() {
    var total = 0;
    var rows = document.querySelectorAll(".cart-items tr");
    rows.forEach(function(row) {
        total += parseFloat(row.querySelector(".subtotal").textContent);
    });

    var bayarInput = parseFloat(document.getElementById("bayarInput").value);
    var kembalian = bayarInput - total;

    document.getElementById("Total").textContent = "Total : " + total;
    document.getElementById("kembalian").textContent = "Kembalian : " + kembalian;
}

// Calculate subtotal when the page loads
calculateSubtotal();

// Calculate and update total and kembalian when bayarInput changes
document.getElementById("bayarInput").addEventListener("input", function() {
    calculateTotalAndKembalian();
});