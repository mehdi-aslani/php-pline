using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;
using Pline.Data;
using Pline.Models;

namespace Pline.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class SipProfileParametersController : ControllerBase
    {
        private readonly PlineContext _context;

        public SipProfileParametersController(PlineContext context)
        {
            _context = context;
        }

        // GET: api/SipProfileParameters
        [HttpGet]
        public async Task<ActionResult<IEnumerable<TblSipProfileParameter>>> GetTblSipProfileParameter()
        {
            return await _context.TblSipProfileParameter.ToListAsync();
        }

        // GET: api/SipProfileParameters/5
        [HttpGet("{id}")]
        public async Task<ActionResult<TblSipProfileParameter>> GetTblSipProfileParameter(long id)
        {
            var tblSipProfileParameter = await _context.TblSipProfileParameter.FindAsync(id);

            if (tblSipProfileParameter == null)
            {
                return NotFound();
            }

            return tblSipProfileParameter;
        }

        // PUT: api/SipProfileParameters/5
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPut("{id}")]
        public async Task<IActionResult> PutTblSipProfileParameter(long id, TblSipProfileParameter tblSipProfileParameter)
        {
            if (id != tblSipProfileParameter.Id)
            {
                return BadRequest();
            }

            _context.Entry(tblSipProfileParameter).State = EntityState.Modified;

            try
            {
                await _context.SaveChangesAsync();
            }
            catch (DbUpdateConcurrencyException)
            {
                if (!TblSipProfileParameterExists(id))
                {
                    return NotFound();
                }
                else
                {
                    throw;
                }
            }

            return NoContent();
        }

        // POST: api/SipProfileParameters
        // To protect from overposting attacks, see https://go.microsoft.com/fwlink/?linkid=2123754
        [HttpPost]
        public async Task<ActionResult<TblSipProfileParameter>> PostTblSipProfileParameter(TblSipProfileParameter tblSipProfileParameter)
        {
            _context.TblSipProfileParameter.Add(tblSipProfileParameter);
            await _context.SaveChangesAsync();

            return CreatedAtAction("GetTblSipProfileParameter", new { id = tblSipProfileParameter.Id }, tblSipProfileParameter);
        }

        // DELETE: api/SipProfileParameters/5
        [HttpDelete("{id}")]
        public async Task<IActionResult> DeleteTblSipProfileParameter(long id)
        {
            var tblSipProfileParameter = await _context.TblSipProfileParameter.FindAsync(id);
            if (tblSipProfileParameter == null)
            {
                return NotFound();
            }

            _context.TblSipProfileParameter.Remove(tblSipProfileParameter);
            await _context.SaveChangesAsync();

            return NoContent();
        }

        private bool TblSipProfileParameterExists(long id)
        {
            return _context.TblSipProfileParameter.Any(e => e.Id == id);
        }
    }
}
