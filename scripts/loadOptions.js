document.addEventListener("DOMContentLoaded", () => {
    fetch("../php/get_options.php")
      .then(res => res.json())
      .then(data => {
        const categorySelect = document.getElementById("categorySelect");
        const subcategorySelect = document.getElementById("subcategorySelect");
        const applicationCheckboxes = document.getElementById("applicationCheckboxes");
  
        data.categories.forEach(cat => {
          const opt = document.createElement("option");
          opt.value = cat.id;
          opt.textContent = cat.name;
          categorySelect.appendChild(opt);
        });
  
        categorySelect.addEventListener("change", () => {
          subcategorySelect.innerHTML = "";
          data.subcategories
            .filter(sub => sub.category_id == categorySelect.value)
            .forEach(sub => {
              const opt = document.createElement("option");
              opt.value = sub.id;
              opt.textContent = sub.name;
              subcategorySelect.appendChild(opt);
            });
        });
  
        data.applications.forEach(app => {
          const label = document.createElement("label");
          label.innerHTML = <input type="checkbox" name="applications[]" value="${app.id}"> ${app.name};
          applicationCheckboxes.appendChild(label);
          applicationCheckboxes.appendChild(document.createElement("br"));
        });
      });
  });