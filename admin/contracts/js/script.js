function filler() {
  flag = 1;

  //check fields
  let fields = document.querySelectorAll(".fields");

  fields.forEach(item => {
    if (item.value == "") flag = 0;
  });



  //check dates
  let startDay = new Date(document.getElementsByName("rental_start_date")[0].value);
  let endDay = new Date(document.getElementsByName("rental_end_date")[0].value);

  if (endDay < startDay) flag = 0;

  //calculate sum

    
  let dailyCost = parseInt(document.getElementsByName("daily_cost")[0].value);
  let days = (endDay - startDay) / 86400000 + 1;

  if (!isNaN(days) && days>0) {
    document.getElementsByName("number_of_rental_days")[0].value = days;

    if (!isNaN(dailyCost))
    document.getElementsByName("total_cost")[0].value = days * dailyCost;
  }
}