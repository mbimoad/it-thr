// W01 - Indofood = W01
public string SplitString(string input, char keyword, int index)
{
    string[] parts = input.Split(keyword);
    string result = parts[index].Trim();
    return result;
}

string vendorid = SplitString(cboVendor.Text, '-', 0); // W01



string[] fruits = { "apple", "banana", "orange" };
string result = string.Join(", ", fruits);
Console.WriteLine(result); // Output: "apple, banana, orange"


List<string> numbers = new List<string> { "one", "two", "three" };
string result = string.Join(" and ", numbers);
Console.WriteLine(result); // Output: "one and two and three"