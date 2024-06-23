const countrySelect = document.getElementById("countries");

countrySelect.addEventListener("change", fetchStates);
async function fetchCountries() {
    try {
        const response = await fetch("https://countriesnow.space/api/v0.1/countries");
        const countries = await response.json();
        
        countries.data.forEach(country => {
        
            const option = document.createElement("option");
            option.value = country.country; 
            option.text = country.country;
            countrySelect.appendChild(option);
        });

    } catch (error) {
        console.error("Error fetching countries:", error);
    }
}
async function fetchStates() {
    try {
        console.log(countrySelect.value,'countrySelect')
        const countryCode = countrySelect.value;
        const response = await fetch(`https://countriesnow.space/api/v0.1/countries/states`);
        const data = await response.json();
        
      let stateSelect = document.getElementById("states");
      stateSelect.length = 0;
      let finalStateArray =  data.data.filter((data)=>{
            return data.name == countryCode
        })
        console.log(finalStateArray[0].states)
        finalStateArray.length>0&& finalStateArray[0].states.forEach(result => {
            const option = document.createElement("option");
            option.value = result.name;
            option.text = result.name;
            stateSelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching states:", error);
    }
}

async function fetchCities() {
    try {
        console.log(countrySelect.value,'countrySelect')
        const countryCode = countrySelect.value;
        const response = await fetch(`https://countriesnow.space/api/v0.1/countries/population/cities`);
        const data = await response.json();
        
      let citySelect = document.getElementById("cities");
      citySelect.length = 0;
 
      let finalStateArray =  data.data.filter((resp)=>{
            return resp.country == countryCode
        })
        console.log(finalStateArray[0].states)
        finalStateArray.length>0&& finalStateArray.forEach(result => {
            const option = document.createElement("option");
            option.value = result.city;
            option.text = result.city;
            citySelect.appendChild(option);
        });
    } catch (error) {
        console.error("Error fetching cities:", error);
    }
}
window.onload = fetchCountries;