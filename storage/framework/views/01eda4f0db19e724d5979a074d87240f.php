

<?php $__env->startSection('content'); ?>
<style>
/* ======================= Cards ====================== */
.cardBox {
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 30px;
}

.cardBox .card {
    position: relative;
    background: var(--white);
    padding: 30px;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
    cursor: pointer;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.cardBox .card .numbers {
    position: relative;
    font-weight: 500;
    font-size: 2.5rem;
    color: var(--blue);
}

.cardBox .card .cardName {
    color: var(--black2);
    font-size: 1.1rem;
    margin-top: 5px;
}

.cardBox .card .iconBx {
    font-size: 3.5rem;
    color: var(--black2);
}

.cardBox .card:hover {
    background: var(--blue);
}

.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName,
.cardBox .card:hover .iconBx {
    color: var(--white);
}

/* ================== Order Details List ============== */
.details {
    position: relative;
    width: 100%;
    padding: 20px;
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-gap: 30px;
    /* margin-top: 10px; */
}

.details .recentOrders {
    position: relative;
    display: grid;
    min-height: 500px;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    border-radius: 20px;
}

.details .cardHeader {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.cardHeader h2 {
    font-weight: 600;
    color: var(--blue);
}

.cardHeader .btn {
    position: relative;
    padding: 5px 10px;
    background: var(--blue);
    text-decoration: none;
    color: var(--white);
    border-radius: 6px;
}

.details table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.details table thead td {
    font-weight: 600;
}

.details .recentOrders table tr {
    color: var(--black1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.details .recentOrders table tr:last-child {
    border-bottom: none;
}

.details .recentOrders table tbody tr:hover {
    background: var(--blue);
    color: var(--white);
}

.details .recentOrders table tr td {
    padding: 10px;
}

.details .recentOrders table tr td:last-child {
    text-align: end;
}

.details .recentOrders table tr td:nth-child(2) {
    text-align: end;
}

.details .recentOrders table tr td:nth-child(3) {
    text-align: center;
}

.status.delivered {
    padding: 2px 4px;
    background: #8de02c;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.status.pending {
    padding: 2px 4px;
    background: #e9b10a;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.status.return {
    padding: 2px 4px;
    background: #f00;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.status.inProgress {
    padding: 2px 4px;
    background: #1795ce;
    color: var(--white);
    border-radius: 4px;
    font-size: 14px;
    font-weight: 500;
}

.recentCustomers {
    position: relative;
    display: grid;
    min-height: 500px;
    padding: 20px;
    background: var(--white);
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    border-radius: 20px;
}

.recentCustomers .imgBx {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50px;
    overflow: hidden;
}

.recentCustomers .imgBx img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.recentCustomers table tr td {
    padding: 12px 10px;
}

.recentCustomers table tr td h4 {
    font-size: 16px;
    font-weight: 500;
    line-height: 1.2rem;
}

.recentCustomers table tr td h4 span {
    font-size: 14px;
    color: var(--black2);
}

.recentCustomers table tr:hover {
    background: var(--blue);
    color: var(--white);
}

.recentCustomers table tr:hover td h4 span {
    color: var(--white);
}
</style>
<!-- ======================= Cards ================== -->
<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers">1,504</div>
            <div class="cardName">Daily Views</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">80</div>
            <div class="cardName">Sales</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">284</div>
            <div class="cardName">Comments</div>
        </div>

        <div class="iconBx">
            <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">$7,842</div>
            <div class="cardName">Earning</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cash-outline"></ion-icon>
        </div>
    </div>
</div>

<!-- ================ Order Details List ================= -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Recent Orders</h2>
            <a href="#" class="btn">View All</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Payment</td>
                    <td>Status</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Star Refrigerator</td>
                    <td>$1200</td>
                    <td>Paid</td>
                    <td><span class="status delivered">Delivered</span></td>
                </tr>

                <tr>
                    <td>Dell Laptop</td>
                    <td>$110</td>
                    <td>Due</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>

                <tr>
                    <td>Apple Watch</td>
                    <td>$1200</td>
                    <td>Paid</td>
                    <td><span class="status return">Return</span></td>
                </tr>

                <tr>
                    <td>Addidas Shoes</td>
                    <td>$620</td>
                    <td>Due</td>
                    <td><span class="status inProgress">In Progress</span></td>
                </tr>

                <tr>
                    <td>Star Refrigerator</td>
                    <td>$1200</td>
                    <td>Paid</td>
                    <td><span class="status delivered">Delivered</span></td>
                </tr>

                <tr>
                    <td>Dell Laptop</td>
                    <td>$110</td>
                    <td>Due</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>

                <tr>
                    <td>Apple Watch</td>
                    <td>$1200</td>
                    <td>Paid</td>
                    <td><span class="status return">Return</span></td>
                </tr>

                <tr>
                    <td>Addidas Shoes</td>
                    <td>$620</td>
                    <td>Due</td>
                    <td><span class="status inProgress">In Progress</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- ================= New Customers ================ -->
    <div class="recentCustomers">
        <div class="cardHeader">
            <h2>Recent Customers</h2>
        </div>

        <table>
            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>
            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                </td>
                <td>
                    <h4>David <br> <span>Italy</span></h4>
                </td>
            </tr>

            <tr>
                <td width="60px">
                    <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                </td>
                <td>
                    <h4>Amit <br> <span>India</span></h4>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Laravel\GoFilm\GoFilm\resources\views/admin/index.blade.php ENDPATH**/ ?>