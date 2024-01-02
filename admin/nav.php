<?php
include '/Applications/XAMPP/xamppfiles/htdocs/food2/loginsystem/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Include Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <!-- Start of Navbar -->
  <nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <!-- Brand Logo -->
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <a href="/food2/admin/home.php" class="font-semibold text-xl tracking-tight">Admin</a>
          </div>
          <!-- Navigation Links -->
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <a href="/food2/admin/home.php" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
              <a href="/food2/admin/guj.php" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Gujrati Dishes</a>
              <a href="/food2/admin/punjabi.php" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Punjabi Dishes</a>
              <a href="/food2/admin/chins.php" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Chinese Dishes</a>
              <a href="/food2/admin/south.php" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">SouthIndian Dishes</a>
              <a href="/food2/admin/snacks.php" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Snacks</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- End of Navbar -->
</body>
</html>