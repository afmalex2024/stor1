<?php
// التحقق من رفع الصورة
if (isset($_FILES['image'])) {
    $image = $_FILES['image'];

    // تحديد مسار المجلد الذي سيتم حفظ الصور فيه
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);  // إنشاء المجلد إذا لم يكن موجوداً
    }

    // إنشاء اسم فريد للملف لمنع التكرار
    $imageName = uniqid() . '-' . basename($image['name']);
    $uploadFilePath = $uploadDir . $imageName;

    // التحقق من نقل الملف إلى المجلد
    if (move_uploaded_file($image['tmp_name'], $uploadFilePath)) {
        // إعادة توجيه إلى الصفحة الرئيسية بعد رفع الصورة
        header('Location: index.html');
        exit;
    } else {
        echo "فشل رفع الصورة.";
    }
} else {
    echo "لم يتم رفع أي صورة.";
}
?>
