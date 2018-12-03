using System.Configuration;
using System.Data;
using System.Data.SqlClient;
using System.Web.Services;
namespace AspnWebServiceDB
{
    /// <summary>
    /// Summary description for ServiceDB
    /// </summary>
    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
    // To allow this Web Service to be called from script, using ASP.NET AJAX, uncomment the following line. 
    //[System.Web.Script.Services.ScriptService]
    public class ServiceDB : System.Web.Services.WebService
    {
        [WebMethod]
        public DataTable GetDados()
        {
            string constr = ConfigurationManager.ConnectionStrings["conexaoProdutos"].ConnectionString;
            using (SqlConnection con = new SqlConnection(constr))
            {
                using (SqlCommand cmd = new SqlCommand("SELECT * FROM Produtos"))
                {
                    using (SqlDataAdapter sda = new SqlDataAdapter())
                    {
                        cmd.Connection = con;
                        sda.SelectCommand = cmd;
                        using (DataTable dt = new DataTable())
                        {
                            dt.TableName = "Produtos";
                            sda.Fill(dt);
                            return dt;
                        }
                    }
                }
            }
        }
    }
}

</configuration
   .....
   .....
  </system.codedom>
  <connectionStrings>
    <add name = "conexaoProdutos" connectionString="Data Source=MACORATTI;Initial Catalog=Cadastro;Integrated Security=True" providerName="System.Data.SqlClient"/>
  </connectionStrings>
</configuration
