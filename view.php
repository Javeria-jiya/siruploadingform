<?php
include './header.php';
?>

<h2 class="mb-4">Submitted Applications</h2>
<table class="table table-bordered table-hover">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Position</th>
            <th>CV</th>
            <th>Profile</th>  <!-- New Column for Profile Picture -->
        </tr>
    </thead>

    <tbody>
        <?php
        include './db.php';
        $result = $conn->query("SELECT * from applications ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()) {
        ?>

            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= ($row['fullname']); ?></td>
                <td><?= ($row['email']); ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['position']; ?></td>
                <td>
                    <a href="uploads/<?= $row['cv_filename'];?>" target="_blank" class="btn btn-sm btn-info">View</a>
                </td>
                <td>
                    <!-- Display Profile Picture -->
                    <img src="uploads/profile_pictures/<?= $row['profile_picture']; ?>" alt="Profile Picture" width="50" height="50px"  style="border-radius: 50%; object-fit: cover;" >
                </td>
            </tr>

        <?php
        }
        ?>

    </tbody>
</table>

<?php
    include './footer.php';
?>
