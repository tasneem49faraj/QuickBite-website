<?php/*
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "quickbite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array of data for insertion
$productData = [
 
    ["1", "Lemon, Garlic Butter Chicken and Green Beans Skillet", "12", "img/m1.1.jpg" ,"img/m1.2.jpg","Chicken thighs and green beans are cooked in one skillet for the flavor combination is spot on.* 3 – 6 skinless, boneless chicken thighs with green beans."],

    ["1", "Garlic Butter Steak and Potatoes Skillet", "16", "img/m2.1.jpg" ,"img/m2.2.jpg" , "Juicy steak and crisp-golden potatoes are pan-seared and cooked to perfection with a luscious garlic, herbs, and butter sauce. The thing we love with flank is that it's a lean, yet soft cut of beef, meaning this garlic butter steak recipe is nearly impossible to mess up."],
   
    ["1", "Pan-Seared Steak in Butter Sauce", "15", "img/m3.1.jpg" ,"img/m3.2.jpg"," Juicy steak coated with a silky butter sauce reduction *the marinade(soy sauce with coconut amino,olive oil and Sriracha)"],
   
    ["1", "Honey Glazed Salmon", "15", "img/m4.1.jpg" ,"img/m4.2.jpg" ," It's  juicy, so satisfying  and the sweet and tangy flavors are irresistible.* serve with steamy, fluffy white rice and  delicious sauce.(We use boneless, skinless filets for this recipe and the the Glaze is the honey with soy sauce)"],
   
    ["1", "Surf and Turf (Steak and Shrimp)", "16", "img/m5.1.jpg" ,"img/m5.2.jpg"," The key to making great surf and turf is all of the accumulated flavors from cooking the tender filet mignon steak and shrimp in the same pan with flavored butter.The flavors super flavorful, juicy, and memorable. *( large 21-25 count shrimp, Filet Mignon – steaks even thickness and about 1 1/2 thick, Garlic and Rosemary)"],
   
    ["1", "Shrimp and Mushrooms in a Garlic Sauce", "14", "img/m6.1.jpg" ,"img/m6.2.jpg","This shrimp and mushrooms in garlic sauce is luscious, and juicy . It serve over rice and potatoes ,it an all-around great dish! *(Olive Oil, tomatoes, garlic,  Mushrooms, onion,  sweet chili sauce ,sour cream and 1 Lb large shrimp)"],
   
    ["1", "Beef Stew", "14", "img/m7.1.jpg" ,"img/m7.2.jpg","This Beef Stew is made in a Crockpot. The stew is slow-cooked for hours until the beef is fall-apart tender and full of flavor. This beef stew recipe consists of hearty beef chuck roast and a variety of vegetables that are softened to perfection while cooking. The flavors from all the ingredients meld together as the stew simmers low and slow, making the stew exactly what it should be  — perfect. * it serve with Crusty French Bread "],
   
    ["1", "Cheesy Spinach Stuffed Chicken Breasts", "13", "img/m8.1.jpg" ,"img/m8.2.jpg","Tender chicken stuffed with cream cheese, mozzarella, parmesan, and fresh chopped spinach. The filling becomes super creamy and cheesy in the oven and it keeps the chicken breast really juicy. * (3 large pieces of stuffed chicken breasts ,boneless and skinless.Cheese, potatoes,Spinach ,Mayonnaise and Cream Cheese)"],
   
    ["1", "General Tso's Chicken", "14", "img/m9.1.jpg" ,"img/m9.2.jpg","fried chicken pieces that are breaded and tossed in a tangy sauce. served with broccoli and a bed of steamed rice . *The sauce for General Tso’s chicken is rice vinegar, soy sauce, hoisin sauce, water, sugar, and  corn starch ."],
   
    ["1", "Smash Burger with  Sauce ", "8", "img/m10.1.jpg" ,"img/m10.2.jpg","Smash burgers have the iconic flavor profile of classic Burgers, but that double burger patty with cheese melted in between is irresistible and you’ll love the special sauce. *(beef,cheddar cheese,lettuce, tomato, onion sliced into thin rings and Dill Pickles.) * Burger Sauce: mayonnaise,yellow mustard."],
   
    ["1", "Chicken Pizza with Creamy Garlic Sauce", "10", "img/m11.1.jpg" ,"img/m11.2.jpg","*( Mozzarella cheese grated،chicken ,tomatoe, basil and sliced mushrooms ). *The Sauce :butter ,  flour , milk ,Parmesan cheese ,  garlic and basil."],
   
    ["1", "Creamy Cajun Chicken Pasta", "8", "img/m12.1.jpg" ,"img/m12.2.jpg","Juicy chicken breast tossed with tender pasta in a creamy cajun garlic sauce. *In this recipe, we used linguine pasta, chicken breasts, Whipping Cream, Cajun Seasoning and Parmesan."],
   
    ["1", "Spaghetti and Meatballs", "8", "img/m13.1.jpg" ,"img/m13.2.jpg"," Juicy and big Meatballs , spaghetti, crushed tomatoes, basil, garlic,  onion ,parmesan cheese and sweet ground Italian sausage"],
    
    ["1", "Fish Tacos with Sauce.", "7", "img/m14.1.jpg" ,"img/m14.2.jpg","Our all-time favorite Fish Tacos recipe! These are loaded with fresh ingredients and perfectly seasoned plump fish. Don’t skip the best fish taco sauce – a garlic lime crema that you will want it on all your tacos! * We used tilapia but you are welcome to order any white fish. Salmon or shrimp would be amazing as well! * fish taco sauce( sour cream, mayo, garlic powder and sriracha)"],
 
   
   
   
   
   
   
    ["2", "Shakshuka", "5", "img/s1.1.jpg" ,"img/s1.2.jpg"," Eggs poached in a rich garlicky tomato sauce"],

    ["2", "Broccoli Cauliflower Salad", "4", "img/s2.1.jpg" ,"img/s2.2.jpg","(broccoli, cauliflowerdried , cranberries, fresh lemon juice, honey, almonds and pine nuts)"],

    ["2", "Roasted Broccoli", "3", "img/s3.1.jpg" ,"img/s3.2.jpg","Broccoli florets with oil, garlic, and seasoning are baked until tender and golden. We love to serve this topped with freshly grated parmesan cheese."],

    ["2", "Garlic Mashed Potatoes", "3", "img/s4.1.jpg", "img/s4.2.jpg", "(potatoes, garlic, butter, sour cream)"],
    ["2", "Beet Salad with Arugula and Balsamic Vinaigrette", "4", "img/s5.1.jpg" ,"img/s5.2.jpg","(beets,baby arugula,dried cranberries,feta cheese, tomato,Balsamic Vinaigrette)"],

    ["2", "Tomato Cucumber Mozzarella Salad", "4", "img/s6.1.jpg" ,"img/s6.2.jpg","It's loaded with juicy cherry tomatoes, crisp cucumber, avocado, and. fresh mozzarella cheese, all drizzled with a lovely and simple balsamic garlic dressing."],
    ["2", "Crispy Onion Rings with Dipping Sauce ", "3", "img/s7.1.jpg" ,"img/s7.2.jpg","Dipping Sauce( Mayonnaise, Ketchup, Worcestershire sauce ,sour cream,ground paprika"],

    ["2", "Greek Lemon Potatoes", "3", "img/s8.1.jpg" ,"img/s8.2.jpg","These crispy, golden potatoes with a creamy inside and just a hint of tangy lemon, will transport you right to the Mediterranean"],



    
    ["3", "Blueberry Mango Smoothie", "5", "img/d1.1.jpg" ,"img/d1.2.jpg","Greek Yogurt, banana, lemon, mango, blueberries and honey."],
 
    ["3", "Strawberry Cherry Smoothies", "5", "img/d2.1.jpg" ,"img/d2.2.jpg","strawberries, orange, banana, sweet red cherries and honey."],
   
    ["3", "Apricot Strawberry Smoothie", "5", "img/d3.1.jpg" ,"img/d3.2.jpg","apricots, strawberries, coconut water and pineapple."],
  
    ["3", "Tropical Mango Pineapple Smoothie", "5", "img/d4.1.jpg" ,"img/d4.2.jpg","pineapple, mango, orange, banana and almond milk."],
 
    ["3", "Cranberry Pineapple Juice ", "4", "img/d5.1.jpg" ,"img/d5.2.jpg"," Pineapple Juice, Cranberry Juice , Ginger , cranberries, lemon and ice"],
   
    ["3", "Iced Tea", "3", "img/d6.1.jpg" ,"img/d6.2.jpg","Iced Tea"],
 
    ["3", "Iced Coffee with Condensed Milk", "3", "img/d7.1.jpg" ,"img/d7.2.jpg","Iced Coffee with Condensed Milk"],




    ["4", "Raspberry Mousse ", "8", "img/de1.1.jpg" ,"img/de1.2.jpg"," Raspberry Mousse has layers of fresh raspberries, ladyfinger cookies, and a sweet-tart mousse bursting with fresh raspberry flavor. *This raspberry mousse recipe is served in individual cups"],

    ["4", "Baklava ", "7", "img/de2.1.jpg" ,"img/de2.2.jpg"," This honey baklava is flaky, crisp and tender with the honey-lemon syrup and ground cinnamon."],
 
    ["4", "Cheesecakes with Caramel Sauce ", "7", "img/de3.1.jpg" ,"img/de3.2.jpg","The sweetened condensed milk is the secret ingredient, making the cheesecake perfectly sweetened and creamy smooth. For the topping, we used our caramel sauce"],
 
    ["4", "Raspberry Pretzel Jello ", "6", "img/de4.1.jpg" ,"img/de4.2.jpg","Raspberry Jello, Raspberry, salted pretzel, cream cheese."],
 
    ["4", "Donuts Filled with Jelly ", "4", "img/de5.1.jpg" ,"img/de5.2.jpg","Donuts Filled with Jelly"],
 
    ["4", "Crepes with Greek Yogurt Cream ", "5", "img/de6.1.jpg" ,"img/de6.2.jpg","Greek Yogurt Filling:Greek Yogurt,cream cheese, cream cheese, sugar"],
  
    ["4", "Classic Chocolate Mousse", "6", "img/de7.1.jpg" ,"img/de7.2.jpg"," Toppings: whipping cream, chocolate shavings, raspberries. * Served in individual bowls"],
 
    ["4", "Affogato Coffee Ice Cream ", "5", "img/de8.1.jpg" ,"img/de8.2.jpg"," Servings: 1 serving(2 scoops vanilla ice cream, 2 oz espresso)  *Toppings: Caramel sauce,Chocolate sauce,Chocolate, Cocoa powder, hazelnuts and pistachios"],
  
    ["4", "Blueberry Crumble (Extra Blueberries) ", "7", "img/de9.1.jpg" ,"img/de9.2.jpg","This blueberry crumble has layers of plump and juicy blueberries covered with a crumbly topping and piled high with vanilla ice cream ."],
 





    ["5", "Chocolate Crinkle Cookies", "3", "img/fb1.1.jpg" ,"img/fb1.2.jpg","Chocolate Crinkle Cookies have a rich and fudgy center with a crisp powdered sugar outer layer"],
    
    ["5", "Almond Croissants ", "3", "img/fb2.1.jpg" ,"img/fb2.2.jpg","Almond Croissants"],
  
    ["5", "Crusty Bread", "3", "img/fb3.1.jpg" ,"img/fb3.2.jpg"," 1 Loaf=5 slices"],
   
    ["5", "Portuguese Bread", "4", "img/fb4.1.jpg" ,"img/fb4.2.jpg","* 1loaf =8 slicesy"],
  
    ["5", "Banana Bread", "5", "img/fb5.1.jpg" ,"img/fb5.2.jpg","Banana Bread Recipe that is loaded with bananas, tangy-sweet raisins, and toasted walnuts.* Servings 5 people"],
    
    ["5", "Apple Pie", "6", "img/fb6.1.jpg" ,"img/fb6.2.jpg"," Servings: 8 people"],
    
    ["5", "Peanut Butter Cookies ", "3", "img/fb7.1.jpg" ,"img/fb7.2.jpg","The cookies are irresistibly soft and chewy with just the right amount of peanut butter so they aren’t overly"],
  
    ["5", "Oatmeal Raisin Cookies ", "4", "img/fb8.1.jpg" ,"img/fb8.2.jpg","Big, soft and chewy Oatmeal Raisin Cookies with melty chocolate morsels."],
    
    ["5", "Wreath Bread", "4", "img/fb9.1.jpg" ,"img/fb9.2.jpg","This wreath bread has a crispy crackly crust and super soft, spongy center. (Servings: 1 wreath per 1 person)"],
    
    ["5", "Pull-Apart Apple Bread", "4", "img/fb10.1.jpg" ,"img/fb10.2.jpg","A soft and fluffy bread loaf that's rolled out like cinnamon buns and topped with a generous portion of a vanilla butter spread, chunks or grated fresh apple and finished off with cinnamon sugar. The dough is cut and stacked like a pull-apart bread and topped with the best glaze. *Glaze: heavy whipping cream, butter, powdered sugar."],


  

   



];

foreach ($productData as $data) {
    $CAT_ID = $data[0];
    $NAME = $data[1];
    $PRICE = $data[2];
    $IMG1 = $data[3];
    $IMG2 = $data[4];
    $DESCRIPTION = $data[5];


    $sql = "INSERT INTO `product` (CAT_ID, NAME, PRICE, IMG1, IMG2, DESCRIPTION) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    
        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssss", $CAT_ID, $NAME, $PRICE, $IMG1, $IMG2, $DESCRIPTION);
    
        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
    ?>*/