# Ninja Forms - Full Country Names

Extends **Ninja Forms (v3.0+)** to ensure that all **country field values** are stored, displayed, and exported as **full country names instead of ISO alpha-2 codes.

Globally to any HTML `<select>` element with the class **`full-iso-country-names`**, ensuring consistent formatting across both the **frontend** and **backend**.

---

## ✅ Features

- Automatically converts ISO alpha-2 country codes into full country names.  
- Applies to:
  - Ninja Forms country fields (frontend + backend).  
  - Any `<select>` with the class `.full-iso-country-names`.  
- Works seamlessly in:
  - Form submissions  
  - Admin entries  
  - Emails  
  - Exports  
  - Stored database values  

---

## 📦 Requirements

- WordPress 5.0+  
- Ninja Forms 3.0+  

---

## 🚀 Installation

1. Download the plugin `.zip` file.  
2. In your WordPress admin, navigate to:  
   **Plugins → Add New → Upload Plugin**  
3. Upload the `.zip` and click **Install Now**.  
4. Activate the plugin.  

No further configuration is required — the plugin works automatically.

---

## 📖 Usage Guide

### 1. Install & Activate

### 2. Using with Forms
- **Ninja Forms**: Add class of `.full-iso-country-names`: to the contaner field of the County Field within Ninja Forms. Country fields are automatically transformed.  
- **Any `<select>`** with `.full-iso-country-names`: Transforms ISO → full name and auto poulates the full Countries options

---

## 📂 Plugin Structure
```
ninja-forms-full-country-names/
│
├── ninja-forms-full-country-names.php   # Main plugin file
├── nf-full-country-names.js             # Frontend JS handler
└── readme.md                            # Documentation (this file)
```
---

## 🔧 Developer Notes

- Country mappings are defined in nf_full_country_names_list() inside ninja-forms-full-country-names.php.
- To extend or customize the mapping, edit this array directly.
- Debugging: the plugin can log actions when enabled (future toggle planned).

---

## 📝 Changelog

### v1.0.2
- Added support for `<select class="full-iso-country-names">`.
- Improved compatibility with custom themes.

### v1.0.1
- Extended support to Ninja Forms backend entries and exports.
- Fixed issue where emails still displayed ISO codes.

### v1.0.0
- Initial release.
- Replaced ISO country codes with full country names for Ninja Forms country fields.

---

## 🤝 Contributing

Pull requests are welcome.  
For major changes, please open an issue first to discuss what you’d like to change.

---

## 📜 License

Distributed under the **GPL v2 or later** license.  

---

## 👨‍💻 Author

Developed by [**Levon Gravett**](https://github.com/levon-brokenponyclub)
