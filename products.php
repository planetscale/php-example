<div class="example-wrapper">
    <div>
        <div>
            <h2>All products</h2>
        </div>

        <div>
            <div class="container py-5">
                <?php if(mysqli_num_rows(getProducts($mysqli)) > 0) : ?>
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <ul class="list-group shadow">
                                <?php
                                $result = getProducts($mysqli);
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                <li class="list-group-item">
                                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                        <div class="media-body order-2 order-lg-1">
                                            <h5 class="mt-0 font-weight-bold mb-2"><?= $row['name']; ?></h5>
                                            <p class="font-italic text-muted mb-0 small"><?= $row['description']; ?></p>
                                            <?php $categoryName = getCategoryName($mysqli, $row['category_id']); ?>
                                            <p><small> Category: <b><?= $categoryName ?></b></small></p>
                                        </div>
                                        <img src="<?= $row['image']; ?>" alt="Generic placeholder image" width="200"
                                             class="ml-lg-5 order-1 order-lg-2">
                                    </div>
                                </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>


                <?php else: ?>

                    <div class="row">
                        <p>No products found</p>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
