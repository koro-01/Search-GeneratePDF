Sure! Here’s a **shortened version** of your **README** with the essential setup instructions and DomPDF installation:

---

# **Laravel Search and PDF Export Project**

A **Post Management System** built with **Laravel**, allowing dynamic post search and PDF export for filtered results.

---

## **Features**
- 🔍 **Search** by **title**, **description**, **category**, or **user name**.
- 📂 **Download PDF** of filtered results.
- 🖋 **Relational Data**: Posts linked to categories and users.

---

## **Technologies Used**
- **Laravel**  
- **MySQL**  
- **DomPDF** for PDF generation  
- **Tailwind CSS** for styling

---

## **Setup Instructions**


### **Install DomPDF**
```bash
composer require barryvdh/laravel-dompdf
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```



## **Usage**
- **Search** posts using the filter.
- **Download PDF** of filtered results.

---

## **License**
MIT License

---


