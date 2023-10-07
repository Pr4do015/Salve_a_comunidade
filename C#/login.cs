using System;
using System.Data.SqlClient;

public partial class Login : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.HttpMethod == "POST")
        {
            string email = Request.Form["Email"];
            string senha = Request.Form["Senha"];

            string connectionString = "Data Source=IVENTS-PE053SDA\\SALVE_TCC;Initial Catalog=SALVE;Integrated Security=True;";
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                connection.Open();

                string query = "SELECT ID, Nome FROM Usuarios WHERE Email = @Email AND Senha = @Senha";
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@Email", email);
                command.Parameters.AddWithValue("@Senha", senha);

                SqlDataReader reader = command.ExecuteReader();
                if (reader.Read())
                {
                    // Login bem-sucedido, redirecionar para a página principal
                    Response.Redirect("globo.com");
                }
                else
                {
                    // Login falhou, exibir mensagem de erro
                    Response.Write("Login falhou. Verifique suas credenciais.");
                }
            }
        }
    }
}
