<body>
    <form action="{{ path('addAccount') }}" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="uname"></td>
            </tr>
                        <tr>
                <td>Password:</td>
                <td><input type="password" name="pword"></td>
            </tr>
                        <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="cpword"></td>
            </tr>
                        <tr>
                <td>Email:</td>
                <td><input type="email" name="email"></td>
            </tr>
                        <tr>
                <td></td>
                <td><input type="submit"></td>
            </tr>
        </table>
    </form>
</body>