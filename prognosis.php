<?php
session_start();

// var_dump($_SESSION);
if(!isset($_SESSION["userid"]) || empty($_SESSION["userid"])) {
    header("location: login.php");
    exit;
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        body{
            background-image: url('https://img.freepik.com/free-vector/white-background-with-blue-tech-hexagon_1017-19366.jpg?w=900&t=st=1709404718~exp=1709405318~hmac=c2bc7121338492b34064448c232c4c465e17ba95d99800fde257d798890ee162');
            background-size: cover;
            background-repeat: no-repeat;
        } 

        .wrapper {
            margin-top: 60px;
        }
    </style>
    
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <div>
            <nav class="navbar bg-body-tertiary fixed-top" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="welcome.php">MedTrack</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="history.php">History</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reports
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="createReport.php">Add Report</a></li>
                            <li><a class="dropdown-item" href="modifyReport.php">Edit Report</a></li>
                            <li>
                            </li>
                            <li><a class="dropdown-item" href="deleterReport.php">Delete Report</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-danger active" role="button"  aria-pressed="true">Log Out</a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="wrapper">
            <div class="title">
            Disease Prediction
            </div>
            <form action="" method="POST" class="form" name="form1" id="registrationForm" onsubmit="">
            <div class="inputfield">
                <div>
                    <label>Symptoms (*)</label>
                <div><br>
                <input type="checkbox" id="itching" name="symptoms[]" value="itching">
                <label for="symptom1">itching</label><br>
                <input type="checkbox" id="skin_rash" name="symptoms[]" value="skin_rash">
                <label for="symptom2">Skin Rash</label><br>
                <input type="checkbox" id="nodal_skin_eruptions" name="symptoms[]" value="nodal_skin_eruptions">
                <label for="symptom2">Nodal Skin Eruptions</label><br>
                <input type="checkbox" id="continuous_sneezing" name="symptoms[]" value="continuous_sneezing">
                <label for="symptom2">Continuous Sneezing</label><br>
                <input type="checkbox" id="shivering" name="symptoms[]" value="shivering">
                <label for="symptom2">Shivering</label><br>
                <input type="checkbox" id="chills" name="symptoms[]" value="chills">
                <label for="symptom2">Chills</label><br>
                <input type="checkbox" id="joint_pain" name="symptoms[]" value="joint_pain">
                <label for="symptom2">Joint Pain</label><br>
                <input type="checkbox" id="stomach_pain" name="symptoms[]" value="stomach_pain">
                <label for="symptom2">Stomach Pain</label><br>
                <input type="checkbox" id="acidity" name="symptoms[]" value="acidity">
                <label for="symptom2">Acidity</label><br>
                <input type="checkbox" id="ulcers_on_tongue" name="symptoms[]" value="ulcers_on_tongue">
                <label for="symptom2">Ulcers of Tongue</label><br>
                <input type="checkbox" id="muscle_wasting" name="symptoms[]" value="muscle_wasting">
                <label for="symptom2">Muscle Wasting</label><br>
                <input type="checkbox" id="vomiting" name="symptoms[]" value="vomiting">
                <label for="symptom2">Vomiting</label><br>
                <input type="checkbox" id="burning_micturition" name="symptoms[]" value="burning_micturition">
                <label for="symptom2">Burning Micturition</label><br>
                <input type="checkbox" id="spotting_urination" name="symptoms[]" value="spotting_urination">
                <label for="symptom2">Spotting Urination</label><br>
                <input type="checkbox" id="fatigue" name="symptoms[]" value="fatigue">
                <label for="symptom2">Fatigue</label><br>
                <input type="checkbox" id="weight_gain" name="symptoms[]" value="weight_gain">
                <label for="symptom2">Weight Gain</label><br>
                <input type="checkbox" id="anxiety" name="symptoms[]" value="anxiety">
                <label for="symptom2">Anxiety</label><br>
                <input type="checkbox" id="cold_hands_and_feets" name="symptoms[]" value="cold_hands_and_feets">
                <label for="symptom2">Cold Hands and Feet</label><br>
                <input type="checkbox" id="mood_swings" name="symptoms[]" value="mood_swings">
                <label for="symptom2">Mood Swings</label><br>
                <input type="checkbox" id="weight_loss" name="symptoms[]" value="weight_loss">
                <label for="symptom2">Weight Loss</label><br>
                <input type="checkbox" id="restlessness" name="symptoms[]" value="restlessness">
                <label for="symptom2">Restlessness</label><br>
                <input type="checkbox" id="lethargy" name="symptoms[]" value="lethargy">
                <label for="symptom2">Lethargy</label><br>
                <input type="checkbox" id="patches_in_throat" name="symptoms[]" value="patches_in_throat">
                <label for="symptom2">patches in throat</label><br>
                <input type="checkbox" id="irregular_sugar_level" name="symptoms[]" value="irregular_sugar_level">
                <label for="symptom2">Irregular Sugar Level</label><br>
                <input type="checkbox" id="cough" name="symptoms[]" value="cough">
                <label for="symptom2">Cough</label><br>
                <input type="checkbox" id="high_fever" name="symptoms[]" value="high_fever">
                <label for="symptom2">High Fever</label><br>
                <input type="checkbox" id="sunken_eyes" name="symptoms[]" value="sunken_eyes">
                <label for="symptom2">Sunken Eyes</label><br>
                <input type="checkbox" id="breathlessness" name="symptoms[]" value="breathlessness">
                <label for="symptom2">Breathlessness</label><br>
                <input type="checkbox" id="sweating" name="symptoms[]" value="sweating">
                <label for="symptom2">Sweating</label><br>
                <input type="checkbox" id="dehydration" name="symptoms[]" value="dehydration">
                <label for="symptom2">Dehydration</label><br>
                <input type="checkbox" id="indigestion" name="symptoms[]" value="indigestion">
                <label for="symptom2">Indigestion</label><br>
                <input type="checkbox" id="headache" name="symptoms[]" value="headache">
                <label for="symptom2">Headache</label><br>
                <input type="checkbox" id="yellowish_skin" name="symptoms[]" value="yellowish_skin">
                <label for="symptom2">Yellowish skin</label><br>
                <input type="checkbox" id="dark_urine" name="symptoms[]" value="dark_urine">
                <label for="symptom2">Dark Urine</label><br>
                <input type="checkbox" id="nausea" name="symptoms[]" value="nausea">
                <label for="symptom2">Nausea</label><br>
                <input type="checkbox" id="loss_of_appetite" name="symptoms[]" value="loss_of_appetite">
                <label for="symptom2">Loss of Appetite</label><br>
                <input type="checkbox" id="pain_behind_the_eyes" name="symptoms[]" value="pain_behind_the_eyes">
                <label for="symptom2">Pain behind the eyes</label><br>
                <input type="checkbox" id="back_pain" name="symptoms[]" value="back_pain">
                <label for="symptom2">Back Pain</label><br>
                <input type="checkbox" id="constipation" name="symptoms[]" value="constipation">
                <label for="symptom2">Constipatiom</label><br>
                <input type="checkbox" id="abdominal_pain" name="symptoms[]" value="abdominal_pain">
                <label for="symptom2">Abdominal Pain</label><br>
                <input type="checkbox" id="diarrhoea" name="symptoms[]" value="diarrhoea">
                <label for="symptom2">Diarrhoea</label><br>
                <input type="checkbox" id="mild_fever" name="symptoms[]" value="mild_fever">
                <label for="symptom2">Mild Fever</label><br>
                <input type="checkbox" id="yellow_urine" name="symptoms[]" value="yellow_urine">
                <label for="symptom2">Yellow Urine</label><br>
                <input type="checkbox" id="yellowing_of_eyes" name="symptoms[]" value="yellowing_of_eyes">
                <label for="symptom2">Yellowing of eyes</label><br>
                <input type="checkbox" id="acute_liver_failure" name="symptoms[]" value="acute_liver_failure">
                <label for="symptom2">Acute Liver Failure</label><br>
                <input type="checkbox" id="swelling_of_stomach" name="symptoms[]" value="swelling_of_stomach">
                <label for="symptom2">Swelling of stomach</label><br>
                <input type="checkbox" id="swelled_lymph_nodes" name="symptoms[]" value="swelled_lymph_nodes">
                <label for="symptom2">Swelled Lymph Nodes</label><br>
                <input type="checkbox" id="malaise" name="symptoms[]" value="malaise">
                <label for="symptom2">malaise</label><br>
                <input type="checkbox" id="blurred_and_distorted_vision" name="symptoms[]" value="blurred_and_distorted_vision">
                <label for="symptom2">Blurred and Distorted vision</label><br>
                <input type="checkbox" id="phlegm" name="symptoms[]" value="phlegm">
                <label for="symptom2">phlegm</label><br>
                <input type="checkbox" id="throat_irritation" name="symptoms[]" value="throat_irritation">
                <label for="symptom2">Throat Irritation</label><br>
                <input type="checkbox" id="redness_of_eyes" name="symptoms[]" value="redness_of_eyes">
                <label for="symptom2">Redness of eyes</label><br>
                <input type="checkbox" id="sinus_pressure" name="symptoms[]" value="sinus_pressure">
                <label for="symptom2">Sinus Pressure</label><br>
                <input type="checkbox" id="runny_nose" name="symptoms[]" value="runny_nose">
                <label for="symptom2">Runny nose</label><br>
                <input type="checkbox" id="congestion" name="symptoms[]" value="congestion">
                <label for="symptom2">Congestion</label><br>
                <input type="checkbox" id="chest_pain" name="symptoms[]" value="chest_pain">
                <label for="symptom2">Chest Pain</label><br>
                <input type="checkbox" id="weakness_in_limbs" name="symptoms[]" value="weakness_in_limbs">
                <label for="symptom2">Weakness in limbs</label><br>
                <input type="checkbox" id="fast_heart_rate" name="symptoms[]" value="fast_heart_rate">
                <label for="symptom2">Fast Heart Rate</label><br>
                <input type="checkbox" id="pain_during_bowel_movements" name="symptoms[]" value="pain_during_bowel_movements">
                <label for="symptom2">Pain during bowel movements</label><br>
                <input type="checkbox" id="pain_in_anal_region" name="symptoms[]" value="pain_in_anal_region">
                <label for="symptom2">Pain in Anal Region</label><br>
                <input type="checkbox" id="bloody_stool" name="symptoms[]" value="bloody_stool">
                <label for="symptom2">Bloody Stool</label><br>
                <input type="checkbox" id="irritation_in_anus" name="symptoms[]" value="irritation_in_anus">
                <label for="symptom2">Irritation in Anus</label><br>
                <input type="checkbox" id="neck_pain" name="symptoms[]" value="neck_pain">
                <label for="symptom2">Neck Pain</label><br>
                <input type="checkbox" id="dizziness" name="symptoms[]" value="dizziness">
                <label for="symptom2">Dizziness</label><br>
                <input type="checkbox" id="cramps" name="symptoms[]" value="cramps">
                <label for="symptom2">Cramps</label><br>
                <input type="checkbox" id="bruising" name="symptoms[]" value="bruising">
                <label for="symptom2">Bruising</label><br>
                <input type="checkbox" id="obesity" name="symptoms[]" value="obesity">
                <label for="symptom2">Obesity</label><br>
                <input type="checkbox" id="swollen_legs" name="symptoms[]" value="swollen_legs">
                <label for="symptom2">Swollen Legs</label><br>
                <input type="checkbox" id="swollen_blood_vessels" name="symptoms[]" value="swollen_blood_vessels">
                <label for="symptom2">Swollen_blood_vessels</label><br>
                <input type="checkbox" id="puffy_face_and_eyes" name="symptoms[]" value="puffy_face_and_eyes">
                <label for="symptom2">Puffy face and eyes</label><br>
                <input type="checkbox" id="enlarged_thyroid" name="symptoms[]" value="enlarged_thyroid">
                <label for="symptom2">Enlarged Thyroid</label><br>
                <input type="checkbox" id="brittle_nails" name="symptoms[]" value="brittle_nails">
                <label for="symptom2">Brittle Nails</label><br>
                <input type="checkbox" id="swollen_extremeties" name="symptoms[]" value="swollen_extremeties">
                <label for="symptom2">Swollen Extremeties</label><br>
                <input type="checkbox" id="excessive_hunger" name="symptoms[]" value="excessive_hunger">
                <label for="symptom2">Excessive Hunger</label><br>
                <input type="checkbox" id="extra_marital_contacts" name="symptoms[]" value="extra_marital_contacts">
                <label for="symptom2">Extra Marital Contacts</label><br>
                <input type="checkbox" id="drying_and_tingling_lips" name="symptoms[]" value="drying_and_tingling_lips">
                <label for="symptom2">Drying and Tingling Lips</label><br>
                <input type="checkbox" id="slurred_speech" name="symptoms[]" value="slurred_speech">
                <label for="symptom2">Slurred speech</label><br>
                <input type="checkbox" id="knee_pain" name="symptoms[]" value="knee_pain">
                <label for="symptom2">Knee Pain</label><br>
                <input type="checkbox" id="hip_joint_pain" name="symptoms[]" value="hip_join_pain">
                <label for="symptom2">Hip joint Pain</label><br>
                <input type="checkbox" id="muscle_weakness" name="symptoms[]" value="muscle_weakness">
                <label for="symptom2">Muscle weakness</label><br>
                <input type="checkbox" id="stiff_neck" name="symptoms[]" value="stiff_neck">
                <label for="symptom2">Stiff neck</label><br>
                <input type="checkbox" id="swelling_joints" name="symptoms[]" value="swelling_joints">
                <label for="symptom2">Swelling joints</label><br>
                <input type="checkbox" id="movement_stiffness" name="symptoms[]" value="movement_stiffness">
                <label for="symptom2">Movement stiffness</label><br>
                <input type="checkbox" id="spinning_movements" name="symptoms[]" value="spinning_movements">
                <label for="symptom2">Spinning movements</label><br>
                <input type="checkbox" id="loss_of_balance" name="symptoms[]" value="loss_of_balance">
                <label for="symptom2">Loss of balance</label><br>
                <input type="checkbox" id="unsteadiness" name="symptoms[]" value="unsteadiness">
                <label for="symptom2">Unsteadiness</label><br>
                <input type="checkbox" id="weakness_of_one_body_side" name="symptoms[]" value="weakness_of_one_body_side">
                <label for="symptom2">Weakness of one body side</label><br>
                <input type="checkbox" id="loss_of_smell" name="symptoms[]" value="loss_of_smell">
                <label for="symptom2">loss of smell</label><br>
                <input type="checkbox" id="bladder_discomfort" name="symptoms[]" value="bladder_discomfort">
                <label for="symptom2">Bladder discomfort</label><br>
                <input type="checkbox" id="foul_smell_of_urine" name="symptoms[]" value="foul_smell_of_urine">
                <label for="symptom2">Foul smell of urine</label><br>
                <input type="checkbox" id="continuous_feel_of_urine" name="symptoms[]" value="continuous_feel_of_urine">
                <label for="symptom2">Continuour feel of urine</label><br>
                <input type="checkbox" id="passage_of_gases" name="symptoms[]" value="passage_of_gases">
                <label for="symptom2">Passage of gasses</label><br>
                <input type="checkbox" id="internal_itching" name="symptoms[]" value="internal_itching">
                <label for="symptom2">Internal itching</label><br>
                <input type="checkbox" id="toxic_look_(typhos)" name="symptoms[]" value="toxic_look_(typhos)">
                <label for="symptom2">Toxic look (typhos)</label><br>
                <input type="checkbox" id="depression" name="symptoms[]" value="depression">
                <label for="symptom2">Depression</label><br>
                <input type="checkbox" id="irritability" name="symptoms[]" value="irritability">
                <label for="symptom2">Irritability</label><br>
                <input type="checkbox" id="muscle_pain" name="symptoms[]" value="muscle_pain">
                <label for="symptom2">Muscle pain</label><br>
                <input type="checkbox" id="altered_sensorium" name="symptoms[]" value="altered_sensorium">
                <label for="symptom2">Altered sensorium</label><br>
                <input type="checkbox" id="red_spots_over_body" name="symptoms[]" value="red_spots-over_body">
                <label for="symptom2">Red spots over body</label><br>
                <input type="checkbox" id="belly_pain" name="symptoms[]" value="belly_pain">
                <label for="symptom2">Belly pain</label><br>
                <input type="checkbox" id="abnormal_menstruation" name="symptoms[]" value="abnormal_menstruation">
                <label for="symptom2">Abnormal menstruation</label><br>
                <input type="checkbox" id="dischromic _patches" name="symptoms[]" value="dischromic _patches">
                <label for="symptom2">Dischromic patches</label><br>
                <input type="checkbox" id="watering_from_eyes" name="symptoms[]" value="watering_from_eyes">
                <label for="symptom2">Watering from eyes</label><br>
                <input type="checkbox" id="increased_appetite" name="symptoms[]" value="increased_appetite">
                <label for="symptom2">Increased Appetite</label><br>
                <input type="checkbox" id="polyuria" name="symptoms[]" value="polyuria">
                <label for="symptom2">Polyuria</label><br>
                <input type="checkbox" id="family_history" name="symptoms[]" value="family_history">
                <label for="symptom2">Family History</label><br>
                <input type="checkbox" id="mucoid_sputum" name="symptoms[]" value="mucoid_sputum">
                <label for="symptom2">Mucoid sputum</label><br>
                <input type="checkbox" id="rusty_sputum" name="symptoms[]" value="rusty_sputum">
                <label for="symptom2">Rusty sputum</label><br>
                <input type="checkbox" id="lack_of_concentration" name="symptoms[]" value="lack)of_concentration">
                <label for="symptom2">Lack of concentration</label><br>
                <input type="checkbox" id="visual_disturbances" name="symptoms[]" value="visual_disturbances">
                <label for="symptom2">Visual Distrubances</label><br>
                <input type="checkbox" id="reveiving_blood_transfusion" name="symptoms[]" value="receiving_blood_transfusion">
                <label for="symptom2">Recieving blood transfusion</label><br>
                <input type="checkbox" id="receiving_unsterile_injections" name="symptoms[]" value="receiving_unsterile_injections">
                <label for="symptom2">Receiving unsterile injections</label><br>
                <input type="checkbox" id="coma" name="symptoms[]" value="coma">
                <label for="symptom2">Coma</label><br>
                <input type="checkbox" id="stomach_bleeding" name="symptoms[]" value="stomach_bleeding">
                <label for="symptom2">Stomach bleeding</label><br>
                <input type="checkbox" id="distension_of_abdomen" name="symptoms[]" value="distention_of_abdomen">
                <label for="symptom2">Distention of Abdomen</label><br>
                <input type="checkbox" id="history_of_alcohol_consumption" name="symptoms[]" value="history_of_alcohol_consumption">
                <label for="symptom2">History of alcohol consumption</label><br>
                <input type="checkbox" id="fluid_overload" name="symptoms[]" value="fluid_overload">
                <label for="symptom2">Fluid overload</label><br>
                <input type="checkbox" id="blood_in_sputum" name="symptoms[]" value="blood_in_sputum">
                <label for="symptom2">Blood in sputum</label><br>
                <input type="checkbox" id="prominent_veins_on_calf" name="symptoms[]" value="prominent_veins_on_calf">
                <label for="symptom2">Prominent veins on calf</label><br>
                <input type="checkbox" id="palpitations" name="symptoms[]" value="palpitations">
                <label for="symptom2">Palpitations</label><br>
                <input type="checkbox" id="painful_walking" name="symptoms[]" value="painful_walking">
                <label for="symptom2">Painful Walking</label><br>
                <input type="checkbox" id="pus_filled_pimples" name="symptoms[]" value="pus_filled_pimples">
                <label for="symptom2">Pus filled pimples</label><br>
                <input type="checkbox" id="blackheads" name="symptoms[]" value="blackheads">
                <label for="symptom2">Blackheads</label><br>
                <input type="checkbox" id="scurring" name="symptoms[]" value="scurring">
                <label for="symptom2">Scurring</label><br>
                <input type="checkbox" id="skin_peeling" name="symptoms[]" value="skin_peeling">
                <label for="symptom2">Skin peeling</label><br>
                <input type="checkbox" id="silver_like_dusting" name="symptoms[]" value="silver_like_dusting">
                <label for="symptom2">Silver like dusting</label><br>
                <input type="checkbox" id="small_dents_in_nails" name="symptoms[]" value="small_dents_in_nails">
                <label for="symptom2">Small dents in nails</label><br>
                <input type="checkbox" id="inflammatory_nails" name="symptoms[]" value="inflammatory_nails">
                <label for="symptom2">Inflammatory nails</label><br>
                <input type="checkbox" id="blister" name="symptoms[]" value="blister">
                <label for="symptom2">Blister</label><br>
                <input type="checkbox" id="red_sore_around_nose" name="symptoms[]" value="red_sore_around_nose">
                <label for="symptom2">Red sore around nose</label><br>
                <input type="checkbox" id="yellow_crust_ooze" name="symptoms[]" value="yellow_crust_ooze">
                <label for="symptom2">Yellow crust ooze</label><br>


            </div>
            <div class="inputfield">
                <input type="submit" value="Add Report" class="btn">
            </div>
            </form>
        </div>
    </body>
</html>