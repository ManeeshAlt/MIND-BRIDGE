export async function runReplicateAPI() {
  console.log("Running replicate API...");

  const input = {
    prompt: "Can you write a poem about open source machine learning?"
  };

  try {
    const output = await replicate.run("meta/meta-llama-3-70b-instruct", { input });
    console.log("Output received:", output);
  } catch (error) {
    console.error("Error running replicate API:", error);
  }
}
