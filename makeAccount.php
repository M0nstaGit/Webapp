<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Account</title>
</head>
    <body>
        <?php include "/includes/header.php"?>
        <main class="form">
            <form class="formMargin" action="insert.php" method="POST">
                <table class="formTable m-auto">
                    <tbody>
                        <tr>
                            <td><label for="firstName">Fill in your first name:</label></td>
                            <td><input type="text" id="firstName" name="firstName" placeholder="First Name" required/></td>
                        </tr>
                        <tr>
                            <td><label for="lastName">Fill in your last name:</label></td>
                            <td><input type="text" id="lastName" name="lastName" placeholder="Last Name" required/></td>
                        </tr>
                        <tr>
                            <td><label for="email">E-mail:</label></td>
                            <td><input type="email" id="email" name="email" placeholder="E-mail" required/></td>
                        </tr>
                        <tr>
                            <td><label for="phone">Phone number:</label></td>
                            <td><input type="tel" id="phone" name="phone" placeholder="Phone number" required/></td>
                        </tr>
                        <tr>
                            <td><label for="birthdate">Birthdate:</label></td>
                            <td><input type="date" id="birthdate" name="birthdate" required/></td>
                        </tr>
                        <tr>
                            <td><label for="locationId">Your location</label></td>
                            <td><input type="text" id="locationId" name="locationId" required/></td>
                        </tr>
                        <tr>
                            <td><label for="description">Give us a description: </label></td>
                            <td><input type="text" id="description" name="description" placeholder="Description" required /></td>
                        </tr>
                        <tr>
                            <td><label for="pictureURL">Choose a profile picture:</label></td>
                            <td><input type="file" id="pictureURL" name="pictureURL"/></td>
                        </tr>
                        <tr>
                            <td><label for="gender">Give us your gender:</label></td>
                            <td><select id="gender" name="gender">
                                <option value="0">Men</option>
                                <option value="1">Woman</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="preferredGender">Give us your preferred gender:</label></td>
                            <td><select id="preferredGender" name="preferredGender" placeholder="Preffered gender" required>
                                <option value="0">Men</option>
                                <option value="1">Woman</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="userName">Choose a username:</label></td>
                            <td><input type="text" id="userName" name="userName" required/></td>
                        </tr>
                        <tr>
                            <td><label for="password">Choose a password:</label></td>
                            <td><input type="password" id="password" name="password" required/></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Create my account!" class="myButton"/></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </main>
    </body>
</html>
