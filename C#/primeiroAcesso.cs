using System;
using System.Data.SqlClient;
using System.Web.Configuration;

public partial class PrimeiroAcesso : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.Form["Email"] != null && Request.Form["senha"] != null)
        {
            string login = Request.Form["Email"];
            string senha = Request.Form["senha"];

            // Atualize a senha do usu�rio na base de dados ap�s o primeiro acesso.
            string connectionString = "Data Source=IVENTS-PE053SDA\\SALVE_TCC;Initial Catalog=SALVE;Integrated Security=True;";
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                connection.Open();
                string query = "UPDATE Usuarios SET Senha = @senha WHERE Login = @Email";
                using (SqlCommand command = new SqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Email", login);
                    command.Parameters.AddWithValue("@senha", senha);
                    int rowsAffected = command.ExecuteNonQuery();
                    if (rowsAffected > 0)
                    {
                        Response.Write("Senha definida com sucesso. Agora voc� pode fazer login.");
                    }
                    else
                    {
                        Response.Write("N�o foi poss�vel definir a senha. Entre em contato com o suporte.");
                    }
                }
            }
        }
    }
}
