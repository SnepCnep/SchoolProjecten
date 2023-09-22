<!DOCTYPE html>
<html>

<head>
    <style>
        #filter-bar {
            position: static;
            top: 0;
            left: 0;
            width: 200px;
            height: 100vh;
            background: #f1f1f1;
            padding: 20px;
            box-sizing: border-box;
        }

        #filter-bar input[type="submit"],
        #filter-bar select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #filter-bar input[type="submit"]:hover,
        #filter-bar select:hover {
            background-color: #ddd;
            transition: background-color 0.3s ease-in-out;
        }

        #filter-bar select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            position: relative;
            cursor: pointer;
        }

        #filter-bar select::after {
            content: '\25BC';
            display: block;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        #filter-bar select:hover::after {
            color: #888;
        }

        @media only screen and (max-width: 600px) {
            #filter-bar {
                width: 25%;
                max-width: 300px;
                height: 100vh;
                padding: 10px;
                font-size: 7px;
            }
        }
    </style>
</head>

<body>
    <div id="filter-bar">
        <form action="" method="post">
            <label for="animal-height">Dier Hoogte:</label>
            <select id="animal-height" name="animal-height">
                <option value="">Hoogte: </option>
                <option value="small">Klein</option>
                <option value="medium">Normaal</option>
                <option value="big">Groot</option>
            </select>

            <label for="animal-length">Dier Lengte:</label>
            <select id="animal-length" name="animal-length">
                <option value="">Lengte: </option>
                <option value="small">Klein</option>
                <option value="medium">Normaal</option>
                <option value="big">Groot</option>
            </select>

            <label for="animal-gender">Dier Geslacht:</label>
            <select id="animal-gender" name="animal-gender">
                <option value="">Geslacht: </option>
                <option value="male">Man</option>
                <option value="female">Vrouw</option>
            </select>


            <input type="submit" value="Filter">
        </form>
    </div>
</body>

</html>