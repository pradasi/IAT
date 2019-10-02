import java.nio.ByteBuffer;
import java.security.NoSuchAlgorithmException;
import java.util.Random;
import java.security.InvalidKeyException;
import javax.crypto.Mac;
import javax.crypto.spec.SecretKeySpec;


public class CryptProj{
	long Pkey;
	public CryptProj(long key) {
		this.Pkey = key;
	}
	
	public String Generate(){
		OneTimePasswordAlgorithm otp = new OneTimePasswordAlgorithm();
		byte[] b = ByteBuffer.allocate(8).putLong(Pkey).array();		
		long movingFactor = 12365489; 
		int codeDigits = 6;
		String result = null;
		try {
			result = otp.generateOTP(b, movingFactor, codeDigits); 
			} catch(Exception e){
			System.out.println("Error");
			}
		
		return result;
	}
	
	public static void main(String[] args) {
		Random r = new Random();
		long val = r.nextLong();
		CryptProj cryp = new CryptProj(val);
		String otp = cryp.Generate();
		System.out.println(otp);
	}
	
}

class OneTimePasswordAlgorithm {
    OneTimePasswordAlgorithm() {}

    public static byte[] hmac_sha1(byte[] keyBytes, byte[] text) throws NoSuchAlgorithmException, InvalidKeyException {

		Mac hmacSha1;
		try {
	    hmacSha1 = Mac.getInstance("HmacSHA1");
		} catch (NoSuchAlgorithmException nsae) {
	    hmacSha1 = Mac.getInstance("HMAC-SHA-1");
	    }
	    SecretKeySpec macKey = new SecretKeySpec(keyBytes, "RAW");
	    hmacSha1.init(macKey);
	    return hmacSha1.doFinal(text);
    }

    private static final int[] DIGITS_POWER = {1,10,100,1000,10000,100000,1000000,10000000,100000000};

   
    public String generateOTP(byte[] secret, long movingFactor,int codeDigits) throws NoSuchAlgorithmException, InvalidKeyException {
	    
		  String result = null;
		  int digits =  codeDigits;
		  byte[] text = new byte[8];
		  for (int i = text.length - 1; i >= 0; i--) {
		       text[i] = (byte) (movingFactor & 0xff);
		       movingFactor >>= 8;
		   }
		
		    // compute hmac hash
		  byte[] hash = hmac_sha1(secret, text);
		
		// put selected bytes into result int
		  int offset = hash[hash.length - 1] & 0xf;
		   
		  int binary =
		            ((hash[offset] & 0x7f) << 24)
		            | ((hash[offset + 1] & 0xff) << 16)
		            | ((hash[offset + 2] & 0xff) << 8)
		            | (hash[offset + 3] & 0xff);
		
		   int otp = binary % DIGITS_POWER[codeDigits];
		  result = Integer.toString(otp);
		  while (result.length() < digits) {
		      result = "0" + result;
		  }
		  return result;
	}
}





