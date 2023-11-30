using System;
using System.Data.SqlClient;
using System.Web.Configuration;

public partial class EsqueciSenha : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.Form["Email"] != null)
        {
            string email = Request.Form["email"];

            // Verifique se o e-mail existe na sua base de dados.
            string connectionString = "Data Source=IVENTS-PE053SDA\\SALVE_TCC;Initial Catalog=SALVE;Integrated Security=True;";
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                connection.Open();
                string query = "SELECT * FROM Usuarios WHERE Email = @Email";
                using (SqlCommand command = new SqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Email", email);
                    SqlDataReader reader = command.ExecuteReader();
                    if (reader.HasRows)
                    {
                        // Enviar um e-mail de redefinição de senha para o usuário.
                        // Implemente a lógica de envio de e-mail aqui.
                        Response.Write("Um e-mail de redefinição de senha foi enviado para o seu endereço de e-mail.");
                    }
                    else
                    {
                        Response.Write("Não foi possível encontrar um usuário com esse e-mail.");
                    }
                }
            }
        }
    }
}
