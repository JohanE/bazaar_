<h1>Category List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Supercategory</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($category_list as $category): ?>
    <tr>
      <td><a href="<?php echo url_for('category/edit?id='.$category->getId()) ?>"><?php echo $category->getId() ?></a></td>
      <td><?php echo $category->getName() ?></td>
      <td><?php echo $category->getSupercategoryId() ?></td>
      <td><?php echo $category->getPrice() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('category/new') ?>">New</a>
